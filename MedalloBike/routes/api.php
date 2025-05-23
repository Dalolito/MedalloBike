<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', 'App\Http\Controllers\Api\ProductApiController@index')->name('api.product.index');

Route::get('/products/paginate', 'App\Http\Controllers\Api\ProductApiController@paginate')->name('api.product.paginate');
