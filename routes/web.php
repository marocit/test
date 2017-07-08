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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostsController@index');

Route::post('favorite/{post}', 'PostsController@favoritePost');
Route::post('unfavorite/{post}', 'PostsController@unFavoritePost');

Route::get('my_favorites', 'UsersController@myFavorites')->middleware('auth');

Route::post('create-post', 'PostsController@save');

Route::get('post', 'PostsController@postCreateView');

Route::get('tweets', 'TweetsController@index');
Route::get('material', 'TweetsController@material');
Route::get('cat', 'TweetsController@test');

Route::post('create-tweet', 'TweetsController@store')->name('create-tweet');

Route::get('test', 'TweetsController@getURL');

Route::get('fetchCategories', 'CategoriesController@fetchCategories');

Route::delete('deleteLink/{link}', 'TweetsController@deleteLink');
Route::get('category/{category}','TweetsController@category' )->name('category');
Route::get('category1/{category}','TweetsController@category1' )->name('category1');

Route::get('maps', 'MapsController@maps');
Route::get('mapsall', 'MapsController@getAll')->name('mapsAll');
Route::get('fetch', 'MapsController@fetchAll');

Route::post('store', 'MapsController@store');