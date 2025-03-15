<?php

use Illuminate\Support\Facades\Route;

$AdminControllerRoute = 'App\Http\Controllers\Admin\AdminProductController';

Route::get('/admin/product/create', $AdminControllerRoute.'@create')->name('admin.product.create');
Route::post('/admin/product/save', $AdminControllerRoute.'@save')->name('admin.product.save');
