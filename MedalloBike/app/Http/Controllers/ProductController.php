<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function list(): View
        {
            $viewData = [
                'title' => __('user.products.list.title'),
                'subtitle' => __('user.products.list.subtitle'),
                'products' => Product::all(),
                'labels' => [
                    'price' => __('user.products.list.price'),
                    'category' => __('user.products.list.category'),
                    'brand' => __('user.products.list.brand'),
                    'show_product' => __('user.products.list.show_product'),
                    'edit' => __('user.products.list.edit'),
                    'in_stock' => __('user.products.list.in_stock'),
                    'out_of_stock' => __('user.products.list.out_of_stock'),
                    'no_products' => __('user.products.list.no_products'),
                ],
            ];

            return view('product.list')->with('viewData', $viewData);
        }
}