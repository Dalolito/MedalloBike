<?php

namespace App\Http\Controllers;

use App\Interfaces\ReportGenerate;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportGenerator;

    public function __construct(ReportGenerate $reportGenerator)
    {
        $this->reportGenerator = $reportGenerator;
    }

    public function showReports()
    {
        return view('admin.reports.index');
    }

    public function generateReviewsReport(Request $request)
    {
        return $this->reportGenerator->generateReport($request);
    }
}
