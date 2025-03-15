<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;

class AdminProductController extends Controller
{


    public function create(): View
    {
        $categories = Category::all();
        $viewData = [
            'title' => 'Create product',
            'categories' => $categories, 
        ];
        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function save(ProductRequest $request):RedirectResponse
    {
        Product::create($request->validated());

        return back()->with('success', __('messages.success.product_created'));
    }
}