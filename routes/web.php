<?php

use App\Category;

define('MEDIA_ROOT', '/storage/app/images/');
Route::get('/', 'FrontController@index');
Route::get('/product/{id}', 'FrontController@product');
Route::get('/on-sale', 'FrontController@productsOnSale');
Route::get('/formen', 'FrontController@productsForMen');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/home/categories', 'CategoryController');
Route::resource('/home/products', 'ProductController');
