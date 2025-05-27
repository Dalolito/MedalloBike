<?php

namespace App\Utils;

use App\Interfaces\ReportGenerate;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use Symfony\Component\HttpFoundation\Response;

class ReportGenerateWord implements ReportGenerate
{
    public function generateReport(Request $request): Response
    {
        $productReviews = Review::getProductReviewsReport($request->input('start_date'), $request->input('end_date'));
        $generalStats = Review::getGeneralStats($request->input('start_date'), $request->input('end_date'), $productReviews);

        $phpWord = new PhpWord;
        $section = $phpWord->addSection();

        $section->addTitle(__('admin.reports.reviews.title'), 1);
        $section->addText(__('admin.reports.reviews.subtitle'));
        $section->addText(__('admin.reports.reviews.date_range').': '.($request->input('start_date') ? date('d/m/Y', strtotime($request->input('start_date'))) : __('admin.reports.reviews.all')).' - '.($request->input('end_date') ? date('d/m/Y', strtotime($request->input('end_date'))) : __('admin.reports.reviews.all')));
        $section->addTextBreak();

        // General statistics
        $section->addText(__('admin.reports.reviews.general_stats').':', ['bold' => true]);
        $section->addText(__('admin.reports.reviews.total_reviews').': '.$generalStats['total_reviews']);
        $section->addText(__('admin.reports.reviews.average_rating').': '.number_format($generalStats['average_rating'], 2, ',', '.'));
        $section->addText(__('admin.reports.reviews.total_products_reviewed').': '.$generalStats['total_products_reviewed']);
        $section->addTextBreak();

        // Reviews by product table
        $section->addText(__('admin.reports.reviews.by_product').':', ['bold' => true]);
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

        return response()->download($tempFile, 'Reporte de Reseñas.docx')->deleteFileAfterSend(true);
    }
}
