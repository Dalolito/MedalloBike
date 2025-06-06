<?php

namespace App\Http\Controllers\Admin;

// Made by: David Lopera Londoño

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [
            'title' => __('admin.products.list.title'),
            'subtitle' => __('admin.products.list.subtitle'),
            'products' => Product::all(),
        ];

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $categories = Category::all();

        $viewData = [
            'title' => __('admin.products.create.title'),
            'categories' => $categories,
        ];

        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function save(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return back()->with('success', __('messages.success.product_created'));
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);

        $viewData = [
            'title' => $product->getTitle().' - '.__('admin.products.show.title_suffix'),
            'product' => $product,
        ];

        return view('admin.product.show')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        $viewData = [
            'title' => __('admin.products.edit.title'),
            'product' => $product,
            'categories' => $categories,
        ];

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(ProductRequest $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());

        return redirect()->route('admin.product.show', ['id' => $product->getId()])->with('success', __('messages.success.product_updated'));
    }

    public function disable(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->setState('disabled');
        $product->save();

        return redirect()->route('admin.product.show', ['id' => $product->getId()])
            ->with('success', __('messages.success.product_disabled'));
    }

    public function enable(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->setState('available');
        $product->save();

        return redirect()->route('admin.product.show', ['id' => $product->getId()])
            ->with('success', __('messages.success.product_enabled'));
    }

    public function topSelling(): View
    {
        $topProducts = Product::with('category')
            ->topSelling()
            ->get();

        $viewData = [
            'title' => __('admin.products.top_selling.title'),
            'subtitle' => __('admin.products.top_selling.subtitle'),
            'products' => $topProducts,
        ];

        return view('admin.product.topSelling')->with('viewData', $viewData);
    }
}
