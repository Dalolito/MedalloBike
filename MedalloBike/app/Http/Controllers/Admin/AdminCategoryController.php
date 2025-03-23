<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function list(): View
    {
        $viewData = [
            'title' => __('admin.category.list.title'),
            'subtitle' => __('admin.category.list.subtitle'),
            'category' => Category::all(),
        ];

        return view('admin.category.list')->with('viewData', $viewData);
    }
}
