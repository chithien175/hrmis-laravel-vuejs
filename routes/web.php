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
    return redirect()->route('login');
});

Auth::routes();

// ctf0\MediaManager\MediaRoutes::routes();
Route::group([
    'middleware' => 'auth',
], function() {
    // MediaManager
    ctf0\MediaManager\MediaRoutes::routes();
});

// Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');
