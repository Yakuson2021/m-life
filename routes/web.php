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
    Route::get('movie/post', 'Admin\MovieController@add')->middleware('auth')->name('movie.post');
    Route::get('movie/delete', 'Admin\MovieController@delete')->middleware('auth');
        
    //自分の投稿記事（動画含む）更新updateの記述部分
    Route::post('movie/edit', 'Admin\MovieController@update')->middleware('auth');
    Route::get('movie/edit', 'Admin\MovieController@edit')->middleware('auth');

    Route::get('movie/detail', 'Admin\MovieController@detail')->middleware('auth');
    
   //2022/2/8,リプライにいいねをする処理を リプライに付けたいいねを解除する処理//
    Route::get('movie/like/{id}', 'Admin\LikeController@like')->middleware('auth')->name('movie.like');
    Route::get('movie/unlike/{id}', 'Admin\LikeController@unlike')->middleware('auth')->name('movie.unlike');
    
   //2022/3/8,お気に入りする処理を 付けたお気に入りを解除する処理//
    Route::get('movie/favorite/{id}', 'Admin\FavoriteController@favorite')->middleware('auth')->name('movie.favorite');
    Route::get('movie/unfavorite/{id}', 'Admin\FavoriteController@unfavorite')->middleware('auth')->name('movie.unfavorite');
    
    // 2022/3/8,お気に入りした動画を動画一覧表示する処理//
    Route::get('movie/favorite_list', 'Admin\ProfileController@favorite_list')->middleware('auth')->name('favorite_list');

    //コメント投稿処理
    Route::post('movie/posts/{comment_id}/comments','CommentsController@store')->middleware('auth');
    //コメント取消処理
    Route::get('movie/posts/comments/{comment_id}', 'CommentsController@destroy')->middleware('auth');
    
    //特定の投稿者が投稿した動画一覧表示（3/6追加）
    Route::get('movie/posted_personal', 'Admin\MovieController@posted_personal')->middleware('auth')->name('personal');
    
    
    //自分のプロフィール情報更新updateの記述部分
    Route::post('profile/mypage-edit', 'Admin\ProfileController@update')->middleware('auth')->name('mypage-edit');
    Route::get('profile/mypage-edit', 'Admin\ProfileController@edit')->middleware('auth');
    
    Route::get('profile/mypage', 'Admin\ProfileController@check')->middleware('auth')->name('check');
    
    Route::get('movie/index', 'Admin\MovieController@index')->middleware('auth')->name('index');
    Route::get('movie/posted-movie', 'Admin\MovieController@list')->middleware('auth')->name('list');
    
    Route::get('profile/aboutus', 'Admin\ProfileController@aboutus')->middleware('auth');
    Route::get('movie', 'Admin\MovieController@index')->middleware('auth'); // 追記
    
     //自分を含む、利用者一覧データ表示機能（3/3追加）
    Route::get('profile/userlist', 'Admin\ProfileController@userlist')->middleware('auth')->name('userlist');

});

Route::get('/', 'MovieController@index')->name('top');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;

