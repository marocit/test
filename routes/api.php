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

Route::post('test2', 'TweetsController@getUrl2');
Route::get('link', 'LinkPreviewController@index');
Route::get('getlinks', 'LinkPreviewController@getlinks');
Route::post('getlink', 'LinkPreviewController@getResponseUrl');

Route::post('postCategory', 'CategoriesController@postCategory');
