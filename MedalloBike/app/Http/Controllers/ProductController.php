<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $categoryId = $request->query('category');
        $productsQuery = Product::where('state', 'available');

        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }

        $products = $productsQuery->get();
        $categories = Category::where('state', 'available')->get();

        $viewData = [
            'title' => __('app.products_user.list.title'),
            'subtitle' => __('app.products_user.list.subtitle'),
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $categoryId,
        ];

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);

        $reviews = Review::where('product_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $viewData = [
            'title' => $product->getTitle().' - '.__('app.products_user.show.title_suffix'),
            'product' => $product,
            'reviews' => $reviews,
        ];

        return view('product.show')->with('viewData', $viewData);
    }
}
