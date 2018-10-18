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
/* Front end route */
Route::get('/','FrontEndController@index');
Route::get('/product/{id}','FrontEndController@displayProduct');

//cart route
Route::get('/cart/update-quantity/{id}/{quantity}','CartQuantityHandlerController@updateCartQuantity');
Route::get('/cart/update-decrement/{id}/{quantity}','CartQuantityHandlerController@updateCartQuantityDecrement');
Route::resource('/cart','CartController');

/* Back end route */
Route::group(['middleware' => ['auth']],function(){
    Route::resource('/admin/products','ProductsController');
    Route::get('logout','AdminController@logout');
});

/* Registration and Login is automatic admin role. */
/* This is for exam purposes only */
Auth::routes();