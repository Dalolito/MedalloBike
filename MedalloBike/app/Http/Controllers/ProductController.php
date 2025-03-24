<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function list(): View
    {
        $viewData = [
            'title' => __('app.products_user.list.title'),
            'subtitle' => __('app.products_user.list.subtitle'),
            'products' => Product::where('state', 'available')->get(),
        ];

        return view('product.list')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);

        $viewData = [
            'title' => $product->getTitle().' - '.__('app.products_user.show.title_suffix'),
            'product' => $product,
        ];

        return view('product.show')->with('viewData', $viewData);
    }
}
