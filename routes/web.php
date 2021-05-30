<?php

use App\Models\Category;

//Routing FrontOffice
Route::get('/', 'Front\FrontController@index');
Route::get('/product/{id}', 'Front\FrontController@product');
Route::get('/on-sale', 'Front\FrontController@getProductsOnSale');
Route::get('/category/{Category_id}/products', 'Front\FrontController@getCategory');

//Routing BackOffice
Route::get('/admin/products/deleteImage/{id}', 'Admin\ProductController@deleteImage');
Route::get('/home', 'Admin\HomeController@index')->name('home');

//Routing Resources
Route::resource('/admin/categories', 'Admin\CategoryController');
Route::resource('/admin/products', 'Admin\ProductController');

//Routing Auth
Auth::routes();

