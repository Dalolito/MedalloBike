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
            'title' => __('admin.products.create.title'), // Título de la página
            'categories' => $categories, // Lista de categorías
            'labels' => [
                'title' => __('admin.products.create.form.title'),
                'description' => __('admin.products.create.form.description'),
                'category_id' => __('admin.products.create.form.category_id'),
                'select_category' => 'Select a category', // Texto para el placeholder del select
                'image' => __('admin.products.create.form.image'),
                'brand' => __('admin.products.create.form.brand'),
                'price' => __('admin.products.create.form.price'),
                'stock' => __('admin.products.create.form.stock'),
                'submit' => __('admin.products.create.form.submit'),
            ],
        ];

        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function save(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return back()->with('success', __('messages.success.product_created'));
    }

    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('admin.product.list')->with('viewData', $viewData);
    }

    public function show($id): View
    {
        $product = Product::findOrFail($id);

        $viewData = [
            'title' => $product->getTitle().' - Online Store',
            'product' => $product,
            'labels' => [
                'description' => __('admin.products.show.description'),
                'details' => __('admin.products.show.details'),
                'brand' => __('admin.products.show.brand'),
                'category' => __('admin.products.show.category'),
                'stock' => __('admin.products.show.stock'),
                'state' => __('admin.products.show.state'),
                'add_to_cart' => __('admin.products.show.add_to_cart'),
            ],
        ];

        return view('admin.product.show')->with('viewData', $viewData);
    }
}
