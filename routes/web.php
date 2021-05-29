<?php

use App\Category;

Route::get('/', 'FrontController@index');
Route::get('/product/{id}', 'FrontController@product');
Route::get('/on-sale', 'FrontController@getProductsOnSale');
Route::get('/category/{Category_id}/products', 'CategoryController@getCategory');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/home/categories', 'CategoryController');
Route::resource('/home/products', 'ProductController');
