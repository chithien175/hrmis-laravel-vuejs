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

// Trang chủ
Route::get('/', 'Frontend\PageController@getHomePage')->name('katitheme.homepage');
Route::get('/{pageSlug}.html', 'Frontend\PageController@getOtherPage');

// Chi tiet bai viet
Route::get('/bv/{postSlug}.html', 'Frontend\BlogController@getPostDetail')->name('frontend.postDetail');

// Danh muc san pham
Route::get('/sp/danh-muc/{cateSlug}.html', 'Frontend\EcommerceController@getProductsByCategory')->name('frontend.productCategory');
// Chi tiet san pham
Route::get('/sp/{productSlug}.html', 'Frontend\EcommerceController@getProductDetail')->name('frontend.productDetail');

// Chi tiet tim kiem
// Route::get('/tim-kiem/ket-qua.html', 'Frontend\SearchController@searchResult')->name('frontend.searchResult');
Route::get('/tim-kiem', 'Frontend\SearchController@search')->name('frontend.search');


// Lien he
Route::post('/contact-form', 'Frontend\ContactController@postContactForm')->name('post.contactForm');

// Auth
Auth::routes();

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@admin')->name('admin');
    Route::get('/{path}', 'HomeController@admin')->where('path', '([A-z\d-\/_.]+)?');
});
