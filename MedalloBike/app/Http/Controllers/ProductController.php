<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function list(Request $request): View
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
