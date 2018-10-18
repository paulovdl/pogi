<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* List Products */
Route::middleware('auth:api')->get('products', 'ProductsApiController@index');

/* List Single Products */
Route::middleware('auth:api')->get('product/{id}', 'ProductsApiController@show');

/* Create New Product */
Route::middleware('auth:api')->post('product', 'ProductsApiController@store');

/* Update Product */
Route::middleware('auth:api')->put('product', 'ProductsApiController@store');

/* Delete Product */
Route::middleware('auth:api')->delete('product/{id}', 'ProductsApiController@destroy');

