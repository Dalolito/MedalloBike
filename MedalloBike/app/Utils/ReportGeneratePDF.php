<?php

namespace App\Utils;

use App\Interfaces\ReportGenerate;
use App\Models\Product;
use App\Models\Review;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportGeneratePDF implements ReportGenerate
{
    public function generateReport(Request $request): Response
    {
        $productReviews = Review::getProductReviewsReport($request->input('start_date'), $request->input('end_date'));
        $generalStats = Review::getGeneralStats($request->input('start_date'), $request->input('end_date'), $productReviews);
        $pdf = PDF::loadView('admin.report.reportPdf', [
            'productReviews' => $productReviews,
            'generalStats' => $generalStats,
            'title' => __('admin.reports.reviews.title'),
            'subtitle' => __('admin.reports.reviews.subtitle'),
            'startDate' => $request->input('start_date') ? date('d/m/Y', strtotime($request->input('start_date'))) : __('admin.reports.reviews.all'),
            'endDate' => $request->input('end_date') ? date('d/m/Y', strtotime($request->input('end_date'))) : __('admin.reports.reviews.all'),
        ]);

        return $pdf->download('Reporte de Reseñas.pdf');
    }
}
