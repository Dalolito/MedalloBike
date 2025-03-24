<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\View\View;

class RouteController extends Controller
{
    public function list(): View
    {
        $viewData = [
            'title' => __('app.routes_user.list.title'),
            'subtitle' => __('app.routes_user.list.subtitle'),
            'routes' => Route::all(),
        ];

        return view('route.list')->with('viewData', $viewData);
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
