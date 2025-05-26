<?php

namespace App\Http\Controllers;

use App\Interfaces\ReportGenerate;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showReports()
    {
        return view('admin.reports.index');
    }

    public function generateReviewsReport(Request $request, ReportGenerate $reportGenerator)
    {
        return $reportGenerator->generateReport($request);
    }
}
