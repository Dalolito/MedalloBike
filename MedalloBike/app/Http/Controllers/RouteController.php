<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RouteController extends Controller
{
    public function list(Request $request): View
    {
        $difficulty = $request->query('difficulty');
        $routeQuery = Route::query();
        if ($difficulty) {
            $routeQuery = Route::where('difficulty', $difficulty);
        }
        $routes = $routeQuery->get();

        $viewData = [
            'title' => __('app.routes_user.list.title'),
            'subtitle' => __('app.routes_user.list.subtitle'),
            'routes' => $routes,
            'selectedDifficulty' => $difficulty,
        ];

        return view('route.list')->with('viewData', $viewData);
    }

    public function list2(Request $request): View
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
        $route = Route::findOrFail($id);

        $viewData = [
            'title' => $route->getName().' - '.__('app.routes_user.show.title_suffix'),
            'route' => $route,
        ];

        return view('route.show')->with('viewData', $viewData);
    }
}
