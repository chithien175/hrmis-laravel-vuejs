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

Route::middleware('auth:api')->get('/ecommerce', function (Request $request) {
    return $request->user();
});

Route::prefix('ecommerce')->group(function() {
    // PRODUCT
    Route::get('/product', 'EcommerceController@index');
    Route::post('/product', 'EcommerceController@store');
    Route::put('/product/{id}', 'EcommerceController@update');
    Route::delete('/product/{id}', 'EcommerceController@destroy');
    Route::get('/product/find', 'EcommerceController@search');    

    // CATEGORY
    Route::get('/category', 'EcommerceController@cateIndex');
    Route::post('/category', 'EcommerceController@cateStore');
    Route::put('/category/{id}', 'EcommerceController@cateUpdate');
    Route::delete('/category/{id}', 'EcommerceController@cateDestroy');
    Route::get('/category/find', 'EcommerceController@cateSearch');    
    Route::get('/category/list', 'EcommerceController@cateList');  
});