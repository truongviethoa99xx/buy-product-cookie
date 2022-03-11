<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    ['namespace' => 'Course', 'as' => 'course.', 'middleware' => []],
    function () {
        Route::resource('layout', 'IndexController');
        Route::get('product', 'IndexController@data');
        Route::get('add-to-cart', 'IndexController@addToCart');
        Route::get('cart', 'IndexController@viewCart');
    }
);
