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

// Frontend
// Trang Chủ
Route::get('/', 'Frontend\PageController@home')->name('katitheme.pages.home');

// Giới Thiệu
Route::get('/gioi-thieu.html','Frontend\PageController@about')->name('katitheme.pages.about');

// Tin tức
Route::get('/tin-tuc.html','Frontend\PageController@news')->name('katitheme.pages.news');

// Liên hệ
Route::get('/lien-he.html','Frontend\PageController@contact')->name('katitheme.pages.contact');

// Auth
Auth::routes();

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@admin')->name('admin');
    Route::get('/{path}', 'HomeController@admin')->where('path', '([A-z\d-\/_.]+)?');
});
