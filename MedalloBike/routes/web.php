<?php

use Illuminate\Support\Facades\Route;

$AdminControllerRoute = 'App\Http\Controllers\Admin\AdminProductController';

Route::get('/admin/product/create', $controllerRoute . '@create')->name('admin.product.create');
Route::post('/admin/product/save', $controllerRoute . '@save')->name('admin.product.save');
