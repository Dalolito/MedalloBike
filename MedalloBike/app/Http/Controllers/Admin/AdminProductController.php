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
            'title' => __('admin.products.create.title'),
            'categories' => $categories,
            'labels' => [
                'title' => __('admin.products.create.form.title'),
                'description' => __('admin.products.create.form.description'),
                'category_id' => __('admin.products.create.form.category_id'),
                'select_category' => 'Select a category',
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
        $viewData = [
            'title' => __('admin.products.list.title'),
            'subtitle' => __('admin.products.list.subtitle'),
            'products' => Product::all(),
            'labels' => [
                'price' => __('admin.products.list.price'),
                'category' => __('admin.products.list.category'),
                'brand' => __('admin.products.create.form.brand'),
                'show_product' => __('admin.products.list.show_product'),
                'edit' => __('admin.products.list.edit'),
                'disable' => __('admin.products.list.disable'),
                'delete' => __('admin.products.list.delete'),
                'delete_confirmation' => __('admin.products.list.delete_confirmation'),
                'actions' => __('admin.actions'),
                'in_stock' => __('admin.products.list.in_stock'),
                'out_of_stock' => __('admin.products.list.out_of_stock'),
                'no_products' => __('admin.products.list.no_products'),
                'create_product' => __('admin.create_product'),
                'state_disabled' => __('admin.products.edit.form.state_disabled'),
            ],
        ];

        return view('admin.product.list')->with('viewData', $viewData);
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
                'back_to_list' => __('admin.products.show.back_to_list'),
                'delete' => __('admin.products.list.delete'),
                'delete_confirmation' => __('admin.products.list.delete_confirmation'),
                'created_at' => __('admin.products.show.created_at'),
                'updated_at' => __('admin.products.show.updated_at'),
            ],
        ];

        return view('admin.product.show')->with('viewData', $viewData);
    }

    public function edit($id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        $viewData = [
            'title' => __('admin.products.edit.title'),
            'product' => $product,
            'categories' => $categories,
            'labels' => [
                'title' => __('admin.products.edit.form.title'),
                'description' => __('admin.products.edit.form.description'),
                'category_id' => __('admin.products.edit.form.category_id'),
                'select_category' => __('admin.products.edit.form.select_category'),
                'image' => __('admin.products.edit.form.image'),
                'brand' => __('admin.products.edit.form.brand'),
                'price' => __('admin.products.edit.form.price'),
                'stock' => __('admin.products.edit.form.stock'),
                'state' => __('admin.products.edit.form.state'),
                'state_available' => __('admin.products.edit.form.state_available'),
                'state_disabled' => __('admin.products.edit.form.state_disabled'),
                'submit' => __('admin.products.edit.form.submit'),
            ],
        ];

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(ProductRequest $request, $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());

        return redirect()->route('admin.product.show', ['id' => $product->getId()])->with('success', __('messages.success.product_updated'));
    }
}
