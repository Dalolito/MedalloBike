<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminHomeController extends Controller
{
    public function index(): View
    {
        $viewData = [
            'title' => __('admin.dashboard.title'),
            'subtitle' => __('admin.dashboard.subtitle'),
        ];

        return view('admin.home')->with('viewData', $viewData);
    }
}
