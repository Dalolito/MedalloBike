<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = new ProductCollection(
            Product::where('state', 'available')
                   ->where('stock', '>', 0)
                   ->get()
        );
        return response()->json($products, 200);
    }

    public function paginate(): JsonResponse
    {
        $products = new ProductCollection(
            Product::where('state', 'available')
                   ->where('stock', '>', 0)
                   ->paginate(5)
        );
        return response()->json($products, 200);
    }
}