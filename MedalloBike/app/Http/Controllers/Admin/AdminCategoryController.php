<?php

// Made by: Camilo Monsalve Montes

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
        $categoryData = $request->validated();
        $categoryData['state'] = 'available'; // Default state for new categories

        Category::create($categoryData);

        return back()->with('success', __('messages.success.category_created'));
    }

    public function list(): View
    {
        $viewData = [
            'title' => __('admin.category.list.title'),
            'subtitle' => __('admin.category.list.subtitle'),
            'category' => Category::all(),
        ];

        return view('admin.category.list')->with('viewData', $viewData);
    }

    public function show(int $id): View
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

    public function edit(int $id): View
    {
        $category = Category::findOrFail($id);

        $viewData = [
            'title' => __('admin.category.edit.title', ['name' => $category->getName()]),
            'category' => $category,
        ];

        return view('admin.category.edit')->with('viewData', $viewData);
    }

    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return redirect()->route('admin.category.show', ['id' => $category->getId()])
            ->with('success', __('messages.success.category_updated'));
    }

    public function disable(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->setState('disabled');
        $category->save();

        return redirect()->route('admin.category.show', ['id' => $category->getId()])
            ->with('success', __('messages.success.category_disabled'));
    }

    public function enable(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->setState('available');
        $category->save();

        return redirect()->route('admin.category.show', ['id' => $category->getId()])
            ->with('success', __('messages.success.category_enabled'));
    }
}
