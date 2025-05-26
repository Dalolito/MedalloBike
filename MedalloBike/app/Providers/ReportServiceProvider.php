<?php

namespace App\Providers;

use App\Interfaces\ReportGenerate;
use App\Utils\ReportGenerateExcel;
use App\Utils\ReportGeneratePDF;
use App\Utils\ReportGenerateWord;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ReportGenerate::class, function ($app) {
            $format = request()->input('format', 'pdf');

            if ($format === 'word') {
                return new ReportGenerateWord;
            } else {
                return new ReportGeneratePDF;
            }
        });
    }
}