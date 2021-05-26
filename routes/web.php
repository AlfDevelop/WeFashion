<?php

use App\Category;


Route::get('/', function () {return view('front.index');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/home/categories', 'CategoryController');
Route::resource('/home/products', 'ProductController');
