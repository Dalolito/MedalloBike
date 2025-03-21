<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$AdminProductControllerRoute = 'App\Http\Controllers\Admin\AdminProductController';
$HomeControllerRoute = 'App\Http\Controllers\HomeController';
$ProductControllerRoute = 'App\Http\Controllers\ProductController';

// Home Controller routes
Route::get('/', $HomeControllerRoute.'@index')->name('home.index');

// Admin Product Controller routes
Route::get('/admin/product/create', $AdminProductControllerRoute.'@create')->name('admin.product.create');
Route::post('/admin/product/save', $AdminProductControllerRoute.'@save')->name('admin.product.save');
Route::get('/admin/product/list', $AdminProductControllerRoute.'@list')->name('admin.product.list');
Route::get('/admin/product/show/{id}', $AdminProductControllerRoute.'@show')->name('admin.product.show');
Route::get('/admin/product/edit/{id}', $AdminProductControllerRoute.'@edit')->name('admin.product.edit');
Route::post('/admin/product/update/{id}', $AdminProductControllerRoute.'@update')->name('admin.product.update');
Route::get('/admin/product/disable/{id}', $AdminProductControllerRoute.'@disable')->name('admin.product.disable');
Route::get('/admin/product/enable/{id}', $AdminProductControllerRoute.'@enable')->name('admin.product.enable');

// Product Controller routes
Route::get('/product/list', $ProductControllerRoute.'@list')->name('product.list');
Route::get('/product/show/{id}', $ProductControllerRoute.'@show')->name('product.show');

Auth::routes();
