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

Route::middleware('auth:api')->get('/blog', function (Request $request) {
    return $request->user();
});

Route::prefix('blog')->group(function() {
    // POST
    Route::get('/post', 'BlogController@index');
    Route::post('/post', 'BlogController@store');
    Route::put('/post/{id}', 'BlogController@update');
    Route::delete('/post/{id}', 'BlogController@destroy');
    Route::get('/post/find', 'BlogController@search');    

    // CATEGORY
    Route::get('/category', 'BlogController@cateIndex');
    Route::post('/category', 'BlogController@cateStore');
    Route::put('/category/{id}', 'BlogController@cateUpdate');
    Route::delete('/category/{id}', 'BlogController@cateDestroy');
    Route::get('/category/find', 'BlogController@cateSearch');    
});