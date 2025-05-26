<?php

namespace App\Utils;

use App\Interfaces\ReportGenerate;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;

class ReportGenerateWord implements ReportGenerate
{
    public function generateReport(Request $request)
    {
        $productReviews = $this->getProductReviews($request);
        $generalStats = $this->getGeneralStats($request, $productReviews);

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addTitle(__('admin.reports.reviews.title'), 1);
        $section->addText(__('admin.reports.reviews.subtitle'));
        $section->addText(__('admin.reports.reviews.date_range') . ': ' . ($request->input('start_date') ? date('d/m/Y', strtotime($request->input('start_date'))) : 'Todo') . ' - ' . ($request->input('end_date') ? date('d/m/Y', strtotime($request->input('end_date'))) : 'Todo'));
        $section->addTextBreak();

        // General statistics
        $section->addText(__('admin.reports.reviews.general_stats') . ':', ['bold' => true]);
        $section->addText(__('admin.reports.reviews.total_reviews') . ': ' . $generalStats['total_reviews']);
        $section->addText(__('admin.reports.reviews.average_rating') . ': ' . number_format($generalStats['average_rating'], 2, ',', '.'));
        $section->addText(__('admin.reports.reviews.total_products_reviewed') . ': ' . $generalStats['total_products_reviewed']);
        $section->addTextBreak();

        // Reviews by product table
        $section->addText(__('admin.reports.reviews.by_product') . ':', ['bold' => true]);
        $table = $section->addTable();
        $table->addRow();
        $table->addCell()->addText(__('admin.reports.reviews.product'));
        $table->addCell()->addText(__('admin.reports.reviews.brand'));
        $table->addCell()->addText(__('admin.reports.reviews.reviews_count'));
        $table->addCell()->addText(__('admin.reports.reviews.avg_rating'));
        $table->addCell()->addText(__('admin.reports.reviews.min_rating'));
        $table->addCell()->addText(__('admin.reports.reviews.max_rating'));

        foreach ($productReviews as $product) {
            $table->addRow();
            $table->addCell()->addText($product->title);
            $table->addCell()->addText($product->brand);
            $table->addCell()->addText($product->reviews_count);
            $table->addCell()->addText(number_format($product->reviews_avg_qualification, 2, ',', '.'));
            $table->addCell()->addText(number_format($product->reviews_min_qualification, 2, ',', '.'));
            $table->addCell()->addText(number_format($product->reviews_max_qualification, 2, ',', '.'));
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $phpWord->save($tempFile, 'Word2007');

        return response()->download($tempFile, 'reporte-resenas.docx')->deleteFileAfterSend(true);
    }

    private function applyReviewDateFilters($q, $start_date, $end_date)
    {
        if ($start_date) {
            $q->whereDate('created_at', '>=', $start_date);
        }
        if ($end_date) {
            $q->whereDate('created_at', '<=', $end_date);
        }
    }

    private function getProductReviews(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = Product::withCount(['reviews' => function ($q) use ($start_date, $end_date) {
            $this->applyReviewDateFilters($q, $start_date, $end_date);
        }])
            ->withAvg(['reviews' => function ($q) use ($start_date, $end_date) {
                $this->applyReviewDateFilters($q, $start_date, $end_date);
            }], 'qualification')
            ->withMin(['reviews' => function ($q) use ($start_date, $end_date) {
                $this->applyReviewDateFilters($q, $start_date, $end_date);
            }], 'qualification')
            ->withMax(['reviews' => function ($q) use ($start_date, $end_date) {
                $this->applyReviewDateFilters($q, $start_date, $end_date);
            }], 'qualification');

        return $query->having('reviews_count', '>', 0)
            ->orderByDesc('reviews_avg_qualification')
            ->get();
    }

    private function getGeneralStats(Request $request, $productReviews)
    {
        $query = Review::query();

        $this->applyDateFilters($query, $request);

        return [
            'total_reviews' => $query->count(),
            'average_rating' => $query->avg('qualification'),
            'total_products_reviewed' => $productReviews->count(),
        ];
    }

    private function applyDateFilters($query, Request $request)
    {
        if ($request->has('start_date')) {
            $query->whereDate('created_at', '>=', request('start_date'));
        }

        if ($request->has('end_date')) {
            $query->whereDate('created_at', '<=', request('end_date'));
        }
    }
} 