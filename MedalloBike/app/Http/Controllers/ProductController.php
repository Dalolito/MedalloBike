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

    public function show($id): View
    {
        $product = Product::findOrFail($id);

        $viewData = [
            'title' => $product->getTitle().' - '.__('admin.products.show.title_suffix'),
            'product' => $product,
            'labels' => [
                'description' => __('admin.products.show.description'),
                'details' => __('admin.products.show.details'),
                'brand' => __('admin.products.show.brand'),
                'category' => __('admin.products.show.category'),
                'stock' => __('admin.products.show.stock'),
                'state' => __('admin.products.show.state'),
                'state_available' => __('admin.products.edit.form.state_available'),
                'state_disabled' => __('admin.products.edit.form.state_disabled'),
                'edit' => __('admin.products.list.edit'),
                'enable' => __('admin.products.list.enable'),
                'disable' => __('admin.products.list.disable'),
                'back_to_list' => __('admin.products.show.back_to_list'),
                'delete' => __('admin.products.list.delete'),
                'delete_confirmation' => __('admin.products.list.delete_confirmation'),
                'created_at' => __('admin.products.show.created_at'),
                'updated_at' => __('admin.products.show.updated_at'),
            ],
        ];

        return view('product.show')->with('viewData', $viewData);
    }
}
