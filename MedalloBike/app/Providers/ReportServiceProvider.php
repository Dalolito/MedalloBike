<?php

namespace App\Providers;

use App\Interfaces\ReportGenerate;
use App\Utils\ReportGenerateExcel;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ReportGenerate::class, function () {
            return new ReportGenerateExcel;
        });
    }
}
