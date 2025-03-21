<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function list(): View
    {
        $viewData = [
            'title' => __('user.products.list.title'),
            'subtitle' => __('user.products.list.subtitle'),
            'products' => Product::all(),
        ];

        return view('product.list')->with('viewData', $viewData);
    }

    public function show($id): View
    {
        $product = Product::findOrFail($id);

        $viewData = [
            'title' => $product->getTitle().' - '.__('user.products.show.title_suffix'),
            'product' => $product,
        ];

        return view('product.show')->with('viewData', $viewData);
    }
}