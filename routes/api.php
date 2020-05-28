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
Route::group(['middleware' => 'cors'], function () {
    Route::resource('client', 'ClientController')->except(['edit', 'create']);
    Route::resource('product', 'ProductController')->except(['edit', 'create']);
    Route::resource('shipping', 'OrderController')->except(['edit', 'create']);
});
    //Route::resource('shipping_detail', 'OrderDetailController')->except(['edit', 'create']);

