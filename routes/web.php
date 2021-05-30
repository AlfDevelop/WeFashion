<?php

use App\Models\Category;

Route::get('/', 'Front\FrontController@index');
Route::get('/product/{id}', 'Front\FrontController@product');
Route::get('/on-sale', 'Front\FrontController@getProductsOnSale');
Route::get('/category/{Category_id}/products', 'Front\FrontController@getCategory');
Route::get('/home/products/deleteImage/{id}', 'ProductController@deleteImage');
Auth::routes();

Route::get('/home', 'Admin\HomeController@index')->name('home');
Route::resource('/home/categories', 'Admin\CategoryController');
Route::resource('/home/products', 'Admin\ProductController');
