<?php

namespace App\Http\Controllers;

use App\Interfaces\ReportGenerate;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('admin.report.index');
    }

    public function export(Request $request, ReportGenerate $reportGenerator): Response
    {
        return $reportGenerator->generateReport($request);
    }
}
