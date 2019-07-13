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

Route::apiResources(['user' => 'API\UserController']);
Route::get('findUser', 'API\UserController@search');
Route::get('profile', 'API\UserController@getProfile');
Route::put('profile', 'API\UserController@updateProfile');

Route::apiResources(['role' => 'API\RoleController']);
Route::get('findRole', 'API\RoleController@search');
Route::get('getPermissions', 'API\RoleController@getPermissions');

Route::get('company', 'API\CompanyController@index');
Route::put('company', 'API\CompanyController@updateCompany');

Route::post('module/toggle', 'API\ModuleController@toggle');