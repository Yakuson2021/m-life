<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Favorite;
use App\Like;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function check(Request $request)
    {
      // User Modelからデータを取得する↓ログインしているユーザーのみもってくるので「$user = User::find($request->id);」でファインドさせる必要なし
      $user = Auth::user();
      //複数のpostに対して1件ずつもらったコメントを処理するため、for eathが必要
      //$user_comments = $user->comments->count();
      $amount_coment_counts = 0;
      foreach ($user->posts as $post){
      $count = $post->comments->count();
      $amount_coment_counts = $amount_coment_counts + $count;
            }
         
    //3/10、自分が投稿した記事に「いいね」がついた数を表示したい
    //ログインユーザが投稿した投稿一覧を取得
      $user = Auth::user();
      $posts = $user->posts;
      
    //   dd($posts);
      
      $posts_likes_count = 0;
      foreach($posts as $post){
      //likesテーブルからpost_idで検索して、件数を取得する
      //$posts_likes_count += Like::where('post_id',*** )->count(); 
        $posts_likes_count += $post->likes()->get()->count();
          
      }
    //   dd($posts_likes_count);
    //   }
    //書き終わったら、return viewに[]を追加する
    //ViewファイルにはgetCommentsAmountNum　のようなcount関数を貼り付けて渡す
    //, ['user_form' => $user]);→これは.mypageに行くときに、この「user_form」で使うという意味
        return view('admin.profile.mypage', ['user_form' => $user,'amount_coment_counts' => $amount_coment_counts,'posts_likes_count'=> $posts_likes_count]);
 }
    public function edit()
    {
     // User Modelからデータを取得する↓ログインしているユーザーのみもってくるので「$user = User::find($request->id);
      $user = Auth::user();
        return view('admin.profile.mypage-edit', ['user_form' => $user]);
    }

    public function update(Request $request)
    {
      // Validationをかける User.phpの$update_rulesに設定したルールで。
      $this->validate($request, User::$update_rules);
      // $profile_formが変数であるということを定義する
      $profile_form = $request->all();
    //   dd($profile_form);
      // User Modelからデータを取得する↓ログインしているユーザーのみもってくる
      $user = Auth::user();
      // ★mynewsのProfileControllerより★　送信されてきたフォームデータを格納する
      unset($profile_form['_token']);
      // ★mynewsのProfileControllerより★ 　該当するデータを上書きして保存する
      $user->fill($profile_form)->save();
      
    //   // ★mynewsのProfileControllerより★ // 以下を追記
    //   $profile_history = new ProfileHistory();
    //   $profile_history->profile_id = $profile->id;
    //   $profile_history->edited_at = Carbon::now();
    //   $profile_history->save();
      
        return redirect('admin/profile/mypage');
    }
    
    public function aboutus()
    {
        return view('admin.profile.aboutus');
    }
    
     //自分を含む、利用者一覧データ表示機能（3/3追加）
    public function userlist(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する（「!= ''」→「''じゃなければ」検索結果を取得する）
          //「$userlist」→これは任意に付ける右辺から代入される変数、Viewファイルに渡し、Viewファイルでは例えば「@each($userlist as $users)～とかに使われる」
          //「User」→これは該当するモデルファイルを取得
          $userlist = User::where('name', $cond_title)->get();
    } else {
          // それ以外はすべての投稿者を取得する
          $userlist = User::all();
    }
        return view('admin.profile.userlist', ['userlist' => $userlist, 'cond_title' => $cond_title]);
    }

    public function favorite_list(Request $request)
    {
        $cond_title = $request->cond_title;
        $favorite_list= Favorite::where('user_id', Auth::id())->get();

             // お気に入りの動画一覧画面（admin.profile.favorite_list）に表示する//
      return view('admin.profile.favorite_list', ['favorite_list' => $favorite_list, 'cond_title' => $cond_title]);
    }
    
}