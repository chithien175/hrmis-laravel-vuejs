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
// Route::get('/', 'Frontend\PageController@home')->name('katitheme.pages.home');

// Giới Thiệu
// Route::get('/gioi-thieu.html','Frontend\PageController@about')->name('katitheme.pages.about');

// Tin tức
// Route::get('/tin-tuc.html','Frontend\PageController@news')->name('katitheme.pages.news');

// Liên hệ
// Route::get('/lien-he.html','Frontend\PageController@contact')->name('katitheme.pages.contact');

// Trang chủ
Route::get('/', 'Frontend\PageController@getHomePage')->name('katitheme.homepage');
Route::get('/{pageSlug}.html', 'Frontend\PageController@getOtherPage');

// Danh muc san pham
Route::get('/sp/danh-muc/{cateSlug}.html', 'Frontend\EcommerceController@getProductsByCategory')->name('frontend.productCategory');
// Chi tiet san pham
Route::get('/sp/{productSlug}.html', 'Frontend\EcommerceController@getProductDetail')->name('frontend.productDetail');



// Lien he
Route::post('/contact-form', 'Frontend\ContactController@postContactForm')->name('post.contactForm');

// Auth
Auth::routes();

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@admin')->name('admin');
    Route::get('/{path}', 'HomeController@admin')->where('path', '([A-z\d-\/_.]+)?');
});
