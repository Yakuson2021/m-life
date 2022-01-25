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

//Route::get('/', function () {
   //return view('welcome');


Route::group(['prefix' => 'admin'], function() {
    Route::post('movie/post', 'Admin\MovieController@create')->middleware('auth');
    Route::get('movie/post', 'Admin\MovieController@add')->middleware('auth');
        
    Route::post('movie/edit', 'Admin\MovieController@edit')->middleware('auth');
    Route::get('movie/edit', 'Admin\MovieController@update')->middleware('auth');
    

    
    Route::post('profile/mypage-edit', 'Admin\ProfileController@update')->middleware('auth');
    Route::get('profile/mypage-edit', 'Admin\ProfileController@edit')->middleware('auth');
    
    Route::get('movie/index', 'Admin\MovieController@index')->middleware('auth');
    Route::get('movie/posted-movie', 'Admin\MovieController@list')->middleware('auth');
    
    Route::get('profile/create-mypage', 'Admin\ProfileController@create')->middleware('auth');
    Route::get('profile/create', 'Admin\ProfileController@create')->middleware('auth');
    
    Route::get('profile/aboutus', 'Admin\ProfileController@aboutus')->middleware('auth');
    
});
Route::get('/', 'MovieController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
