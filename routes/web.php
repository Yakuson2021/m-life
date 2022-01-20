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

Route::group(['prefix' => 'admin'], function() {
    Route::get('movie/post', 'Admin\MovieController@add')->middleware('auth');
    Route::get('profile/mypage-edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::get('profile/create-mypage', 'Admin\ProfileController@create')->middleware('auth');
    Route::get('profile/create', 'Admin\ProfileController@create')->middleware('auth');
});
Route::get('/', 'MovieController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
