<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RouteController extends Controller
{
    /**
     * Display a list of available routes, optionally filtered by zone.
     *
     * @param Request $request
     * @return View
     */
    public function list(Request $request): View
    {
        $routes = Route::query()->get();
        $viewData = [
            'title' => __('app.routes_user.list.title'), 
            'subtitle' => __('app.routes_user.list.subtitle'), 
            'routes' => $routes,
        ];

        return view('route.list')->with('viewData', $viewData); // Return the 'route.index' view with the data
    }

    /**
     * Show the details of a specific route, including reviews.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $route = Route::findOrFail($id); 

        
        $reviews = Review::where('route_id', $id)
            ->orderBy('created_at', 'desc') 
            ->get();

        $viewData = [
            'title' => $route->getName().' - '.__('app.routes_user.show.title_suffix'), 
            'route' => $route, 
            'reviews' => $reviews, 
        ];

        return view('route.show')->with('viewData', $viewData); 
    }
}
