<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function create(): View
    {
        $viewData = [
            'title' => __('admin.category.create.title'),
        ];

        return view('admin.category.create')->with('viewData', $viewData);
    }

    public function save(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return back()->with('success', __('messages.success.category_created'));
    }

    public function list(): View
    {
        $viewData = [
        'title' => __('admin.category.list.title'),
        'subtitle' => __('admin.category.list.subtitle'),
        'category' => Category::all(),];

        return view('admin.category.list')->with('viewData', $viewData);
    }

    public function show($id): View
    {
        $category = Category::findOrFail($id);
        $products = $category->products;

        $viewData = [
            'title' => $category->getName().' - '.__('app.title'),
            'category' => $category,
            'products' => $products,
        ];

        return view('admin.category.show')->with('viewData', $viewData);
    }

    public function edit($id): View
    {
        $category = Category::findOrFail($id);

        $viewData = [
            'title' => __('admin.categories.edit.title', ['name' => $category->getName()]),
            'category' => $category,
            'labels' => [
                'name' => __('admin.categories.edit.form.name'),
                'submit' => __('admin.categories.edit.form.submit'),
            ],
        ];

        return view('admin.category.edit')->with('viewData', $viewData);
    }

    public function update(CategoryRequest $request, $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->setName($request->validated()['name']);
        $category->save();

        return redirect()->route('admin.category.list')
            ->with('success', __('messages.success.category_updated'));
    }

    public function delete($id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        
        // Verificar si la categoría tiene productos asociados
        if ($category->products->count() > 0) {
            return back()->with('error', __('messages.error.category_has_products'));
        }
        
        $category->delete();
        
        return redirect()->route('admin.category.list')
            ->with('success', __('messages.success.category_deleted'));
    }
}