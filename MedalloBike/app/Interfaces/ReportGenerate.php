<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ReportGenerate
{
    public function generateReport(Request $request);
}
