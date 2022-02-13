<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// 以下を追記することでNews Modelが扱えるようになる
use App\Post;


class MovieController extends Controller
{
  public function add(Request $request)
    {
      $user_id = Auth::id();
      return view('admin.movie.post',['user_id' => $user_id]);
    }
    
  public function create(Request $request)
    {
      // dd($request);
      // 以下を追記
      // Varidationを行う
      $this->validate($request, Post::$rules);

      $post = new Post;
      $form = $request->all();

//フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する//
      if (isset($form['movie'])) {
        $path = $request->file('movie')->store('public/movie');//storeは引数の場所に保存するメソッド//
      //public/movieに保存したデータの、実際の保存場所を返してそれをPathに代入している
        $post->movie = basename($path);//代入されたPathからファイル名だけを取り出すメソッドがbasename。　結果としてデータベースに保存されるのがファイル名
        } else {
          $post->movie = null;
      }

      // フォームから送信されてきたimageを削除する
      unset($form['movie']);
      // データベースに保存する
      $post->fill($form);
      $post->save();
      return redirect('admin/movie/posted-movie');
    }
    
public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Post::where('title', $cond_title)->get();
      } else {
          // それ以外はすべての投稿を取得する
          $posts = Post::all();
      }
      return view('admin.movie.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
    
  public function detail(Request $request)
 {
      // Post Modelからデータを取得する
      $post = Post::find($request->id);
      if (empty($post)) {
        abort(404);    
      }
      return view('admin.movie.detail', ['post_form' => $post]);
  }
  
    public function edit(Request $request)
 {
      // Post Modelからデータを取得する
      $post = Post::find($request->id);
      if (empty($post)) {
        abort(404);    
      }
      return view('admin.movie.edit', ['post_form' => $post]);
  }
  
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Post::$rules);
      // Post Modelからデータを取得する
      $post = Post::find($request->id);
      // 送信されてきたフォームデータを格納する
      if ($request->remove == 'true') {
          $post_form['movie'] = null;
     } elseif ($request->file('image')) {
          $path = $request->file('movie')->store('public/movie');
     } else {
          $post_form['movie'] = $post->movie;
          
  }
      unset($post_form['title']);
      unset($post_form['genre']);
      unset($post_form['musician']);
      unset($post_form['songtitle']);
      unset($post_form['postcomment']);

      // 該当するデータを上書きして保存する
      $post->fill($post_form)->save();
      return redirect('admin/movie/');
  }
  
  //投稿した動画の一覧画面を表示させるメソッド//
  public function list(Request $request)
  {
  
    //$cond_title は何をする機能かを確認しておく//
    //$cond_title = $request->cond_title;////
    //      ($cond_title != '')//
    
    //ログインしたユーザーIDに紐づく動画を取ってくる//
    
    //ユーザーIDに紐づく動画であれば動画を取ってくる//
      $posts = Post::where('user_id', Auth::user())->get();
      
     // 自分の動画一覧画面（admin.movie.posted-movie）に表示する//
      return view('admin.movie.posted-movie', ['posts' => $posts,]);
  }
}