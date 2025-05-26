<?php

namespace App\Utils;

use App\Interfaces\ReportGenerate;
use App\Models\Product;
use App\Models\Review;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportGeneratePDF implements ReportGenerate
{
    public function generateReport(Request $request)
    {
        $productReviews = $this->getProductReviews($request);
        $generalStats = $this->getGeneralStats($request, $productReviews);
        $pdf = PDF::loadView('admin.reports.reviewsPdf', [
            'productReviews' => $productReviews,
            'generalStats' => $generalStats,
            'title' => 'Reporte de Reseñas de Productos',
            'subtitle' => 'Análisis de calificaciones y reseñas por producto',
            'startDate' => $request->input('start_date') ? date('d/m/Y', strtotime($request->input('start_date'))) : 'Todo',
            'endDate' => $request->input('end_date') ? date('d/m/Y', strtotime($request->input('end_date'))) : 'Todo',
        ]);

        return $pdf->download('reporte-resenas.pdf');
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
