<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$AdminControllerRoute = 'App\Http\Controllers\Admin\AdminProductController';
$HomeControllerRoute = 'App\Http\Controllers\HomeController';

Route::get('/', $HomeControllerRoute.'@index')->name('home.index');
Route::get('/admin/product/create', $AdminControllerRoute.'@create')->name('admin.product.create');
Route::post('/admin/product/save', $AdminControllerRoute.'@save')->name('admin.product.save');

Auth::routes();