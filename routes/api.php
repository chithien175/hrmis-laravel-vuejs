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

Route::get('dashboard', 'API\DashboardController@index');

// User
Route::apiResources(['user' => 'API\UserController']);
Route::get('findUser', 'API\UserController@search');
Route::get('profile', 'API\UserController@getProfile');
Route::put('profile', 'API\UserController@updateProfile');

// Role
Route::apiResources(['role' => 'API\RoleController']);
Route::get('findRole', 'API\RoleController@search');
Route::get('getPermissions', 'API\RoleController@getPermissions');

// Company
Route::get('company', 'API\CompanyController@index');
Route::put('company', 'API\CompanyController@updateCompany');

// Module
Route::post('module/toggle', 'API\ModuleController@toggle');

// Page
Route::apiResources(['page' => 'API\PageController']);
Route::get('findPage', 'API\PageController@search');

// Media
Route::get('mediaList', 'API\MediaController@list');
Route::post('mediaUpload', 'API\MediaController@upload');
Route::delete('mediaDestroy/{id}', 'API\MediaController@destroy');