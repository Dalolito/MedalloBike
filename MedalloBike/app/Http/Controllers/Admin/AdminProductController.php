<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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

    public function save(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return back()->with('success', __('messages.success.product_created'));
    }
}
