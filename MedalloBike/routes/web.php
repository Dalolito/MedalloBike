<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$AdminProductControllerRoute = 'App\Http\Controllers\Admin\AdminProductController';
$HomeControllerRoute = 'App\Http\Controllers\HomeController';

Route::get('/', $HomeControllerRoute.'@index')->name('home.index');
Route::get('/admin/product/create', $AdminProductControllerRoute.'@create')->name('admin.product.create');
Route::post('/admin/product/save', $AdminProductControllerRoute.'@save')->name('admin.product.save');
Route::get('/admin/product/list', $AdminProductControllerRoute.'@list')->name('admin.product.list');
Route::get('/admin/product/show/{id}', $AdminProductControllerRoute.'@show')->name('admin.product.show');

Auth::routes();
