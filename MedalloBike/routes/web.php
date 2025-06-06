<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$HomeControllerRoute = 'App\Http\Controllers\HomeController';
$ProductControllerRoute = 'App\Http\Controllers\ProductController';
$CartControllerRoute = 'App\Http\Controllers\CartController';
$MyAccountControllerRoute = 'App\Http\Controllers\MyAccountController';
$RouteControllerRoute = 'App\Http\Controllers\RouteController';
$TCGCardControllerRoute = 'App\Http\Controllers\TCGCardController';
$GoogleAuthControllerRoute = 'App\Http\Controllers\Auth\GoogleAuthController';

// Home Controller routes
Route::get('/', $HomeControllerRoute.'@index')->name('home.index');

// Admin Product Controller routes
Route::middleware('admin')->group(function () {
    $AdminProductControllerRoute = 'App\Http\Controllers\Admin\AdminProductController';

    Route::get('/admin/product/create', $AdminProductControllerRoute.'@create')->name('admin.product.create');
    Route::post('/admin/product/save', $AdminProductControllerRoute.'@save')->name('admin.product.save');
    Route::get('/admin/product', $AdminProductControllerRoute.'@index')->name('admin.product.index');
    Route::get('/admin/product/show/{id}', $AdminProductControllerRoute.'@show')->name('admin.product.show');
    Route::get('/admin/product/edit/{id}', $AdminProductControllerRoute.'@edit')->name('admin.product.edit');
    Route::post('/admin/product/update/{id}', $AdminProductControllerRoute.'@update')->name('admin.product.update');
    Route::get('/admin/product/disable/{id}', $AdminProductControllerRoute.'@disable')->name('admin.product.disable');
    Route::get('/admin/product/enable/{id}', $AdminProductControllerRoute.'@enable')->name('admin.product.enable');
    Route::get('/admin/product/top-selling', $AdminProductControllerRoute.'@topSelling')->name('admin.product.topSelling');
});

// Admin Category Controller routes
Route::middleware('admin')->group(function () {
    $AdminCategoryControllerRoute = 'App\Http\Controllers\Admin\AdminCategoryController';

    Route::get('/admin/category/create', $AdminCategoryControllerRoute.'@create')->name('admin.category.create');
    Route::post('/admin/category/save', $AdminCategoryControllerRoute.'@save')->name('admin.category.save');
    Route::get('/admin/category', $AdminCategoryControllerRoute.'@index')->name('admin.category.index');
    Route::get('/admin/category/show/{id}', $AdminCategoryControllerRoute.'@show')->name('admin.category.show');
    Route::get('/admin/category/edit/{id}', $AdminCategoryControllerRoute.'@edit')->name('admin.category.edit');
    Route::put('/admin/category/update/{id}', $AdminCategoryControllerRoute.'@update')->name('admin.category.update');
    Route::get('/admin/category/disable/{id}', $AdminCategoryControllerRoute.'@disable')->name('admin.category.disable');
    Route::get('/admin/category/enable/{id}', $AdminCategoryControllerRoute.'@enable')->name('admin.category.enable');
});

// Product Controller routes
Route::get('/product', $ProductControllerRoute.'@index')->name('product.index');
Route::get('/product/show/{id}', $ProductControllerRoute.'@show')->name('product.show');

// Cart Controller routes
Route::get('/cart', $CartControllerRoute.'@index')->name('cart.index');
Route::get('/cart/delete', $CartControllerRoute.'@delete')->name('cart.delete');
Route::post('/cart/add/{id}', $CartControllerRoute.'@add')->name('cart.add');
Route::middleware('auth')->group(function () {
    $CartControllerRoute = 'App\Http\Controllers\CartController';
    Route::get('/cart/purchase', $CartControllerRoute.'@purchase')->name('cart.purchase');
});

// Review Controller routes
Route::middleware('auth')->group(function () {
    $ReviewControllerRoute = 'App\Http\Controllers\ReviewController';
    Route::post('/review/save', $ReviewControllerRoute.'@save')->name('review.save');
});

// Route Controller routes
Route::get('/route', $RouteControllerRoute.'@index')->name('route.index');
Route::get('/route/show/{id}', $RouteControllerRoute.'@show')->name('route.show');

// My Account Controller routes
Route::middleware('auth')->group(function () {
    $MyAccountControllerRoute = 'App\Http\Controllers\MyAccountController';
    Route::get('/my-account/orders', $MyAccountControllerRoute.'@orders')->name('Myaccount.orders');
});

// Admin Home Controller route
Route::middleware('admin')->group(function () {
    $AdminHomeControllerRoute = 'App\Http\Controllers\Admin\AdminHomeController';
    Route::get('/admin/home', $AdminHomeControllerRoute.'@index')->name('admin.home.index');
});

// TCG Card Controller routes
Route::get('/tcg/cards', $TCGCardControllerRoute.'@index')->name('tcgCard.index');

// Google Auth routes
Route::get('/auth/google', $GoogleAuthControllerRoute.'@redirectToGoogle')->name('auth.google');
Route::get('/auth/google/callback', $GoogleAuthControllerRoute.'@handleGoogleCallback')->name('auth.google.callback');
// Report Controller routes
Route::middleware('auth')->group(function () {
    $ReportControllerRoute = 'App\Http\Controllers\Admin\AdminReportController';
    Route::get('/reports', $ReportControllerRoute.'@index')->name('admin.report.index');
    Route::get('/report/review/', $ReportControllerRoute.'@export')->name('review.export');

});

Auth::routes();
