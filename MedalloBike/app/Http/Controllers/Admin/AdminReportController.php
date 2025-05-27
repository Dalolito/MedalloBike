<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ReportGenerate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class AdminReportController extends Controller
{
    public function index(): View
    {
        $viewData = [
            'title' => __('admin.reports.index.title'),
        ];

        return view('admin.report.index')->with('viewData', $viewData);
    }

    public function export(Request $request, ReportGenerate $reportGenerator): Response
    {
        return $reportGenerator->generateReport($request);
    }
}
