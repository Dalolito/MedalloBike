<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface ReportGenerate
{
    public function generateReport(Request $request): Response;
}
