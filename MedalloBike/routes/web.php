<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$AdminCategoryControllerRoute = 'App\Http\Controllers\Admin\AdminCategoryController';
$HomeControllerRoute = 'App\Http\Controllers\HomeController';
$ProductControllerRoute = 'App\Http\Controllers\ProductController';
$CartControllerRoute = 'App\Http\Controllers\CartController';

// Home Controller routes
Route::get('/', $HomeControllerRoute.'@index')->name('home.index');

// Admin Product Controller routes
Route::middleware('admin')->group(function () {
    $AdminProductControllerRoute = 'App\Http\Controllers\Admin\AdminProductController';

    Route::get('/admin/product/create', $AdminProductControllerRoute.'@create')->name('admin.product.create');
    Route::post('/admin/product/save', $AdminProductControllerRoute.'@save')->name('admin.product.save');
    Route::get('/admin/product/list', $AdminProductControllerRoute.'@list')->name('admin.product.list');
    Route::get('/admin/product/show/{id}', $AdminProductControllerRoute.'@show')->name('admin.product.show');
    Route::get('/admin/product/edit/{id}', $AdminProductControllerRoute.'@edit')->name('admin.product.edit');
    Route::post('/admin/product/update/{id}', $AdminProductControllerRoute.'@update')->name('admin.product.update');
    Route::get('/admin/product/disable/{id}', $AdminProductControllerRoute.'@disable')->name('admin.product.disable');
    Route::get('/admin/product/enable/{id}', $AdminProductControllerRoute.'@enable')->name('admin.product.enable');
});

// Admin Category Controller routes
Route::get('/admin/category/create', $AdminCategoryControllerRoute.'@create')->name('admin.category.create');
Route::get('/admin/category/list', $AdminCategoryControllerRoute.'@list')->name('admin.category.list');
Route::get('/admin/category/show/{id}', $AdminCategoryControllerRoute.'@show')->name('admin.category.show');

// Product Controller routes
Route::get('/product/list', $ProductControllerRoute.'@list')->name('product.list');
Route::get('/product/show/{id}', $ProductControllerRoute.'@show')->name('product.show');

// Cart Controller routes
Route::get('/cart', $CartControllerRoute.'@index')->name('cart.index');
Route::get('/cart/delete', $CartControllerRoute.'@delete')->name('cart.delete');
Route::post('/cart/add/{id}', $CartControllerRoute.'@add')->name('cart.add');
Route::middleware('auth')->group(function () {
    $CartControllerRoute = 'App\Http\Controllers\CartController';
    Route::get('/cart/purchase', $CartControllerRoute.'@purchase')->name('cart.purchase');
});

Route::middleware('auth')->group(function () {
    $ReviewControllerRoute = 'App\Http\Controllers\ReviewController';
    Route::post('/review/save', $ReviewControllerRoute.'@save')->name('review.save');
});

Auth::routes();
