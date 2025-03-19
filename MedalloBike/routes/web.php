<?php

use Illuminate\Support\Facades\Route;

$AdminProductControllerRoute = 'App\Http\Controllers\Admin\AdminProductController';

Route::get('/admin/product/create', $AdminProductControllerRoute.'@create')->name('admin.product.create');
Route::post('/admin/product/save', $AdminProductControllerRoute.'@save')->name('admin.product.save');
Route::get('/admin/product/list', $AdminProductControllerRoute.'@list')->name('admin.product.list');
