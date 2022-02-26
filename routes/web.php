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
    Route::get('movie/delete', 'Admin\MovieController@delete')->middleware('auth');
        

    Route::post('movie/edit', 'Admin\MovieController@update')->middleware('auth');
    Route::get('movie/edit', 'Admin\MovieController@edit')->middleware('auth');

    Route::get('movie/detail', 'Admin\MovieController@detail')->middleware('auth');
    
   //2022/2/8,リプライにいいねをする処理を リプライに付けたいいねを解除する処理//
    Route::get('movie/like/{id}', 'Admin\LikeController@like')->middleware('auth')->name('movie.like');
    Route::get('movie/unlike/{id}', 'Admin\LikeController@unlike')->middleware('auth')->name('movie.unlike');

    //コメント投稿処理
    Route::post('movie/posts/{comment_id}/comments','CommentsController@store')->middleware('auth');

    Route::post('profile/mypage-edit', 'Admin\ProfileController@update')->middleware('auth');
    Route::get('profile/mypage-edit', 'Admin\ProfileController@edit')->middleware('auth');
    
    Route::get('movie/index', 'Admin\MovieController@index')->middleware('auth')->name('aaa');
    Route::get('movie/posted-movie', 'Admin\MovieController@list')->middleware('auth');
    
    Route::get('profile/aboutus', 'Admin\ProfileController@aboutus')->middleware('auth');
    Route::get('movie', 'Admin\MovieController@index')->middleware('auth'); // 追記
    
    

});

//コメント取消処理
Route::get('/comments/{comment_id}', 'CommentsController@destroy')->middleware('auth');
    
Route::get('/', 'MovieController@index')->name('top');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;

