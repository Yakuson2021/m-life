<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\Post;

class MovieController extends Controller
{
  public function add(Request $request)
    {
      return view('admin.movie.post');
    }
    
  public function create(Request $request)
    {
      
      // 以下を追記
      // Varidationを行う
      //$this->validate($request, Post::$rules);//

      $post = new Post;
      $form = $request->all();

// フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['movie'])) {
        $path = $request->file('movie')->store('public/movie');
        $post->movie = basename($path);
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
    
  public function edit(Request $request)
  {
      return view('admin.movie.edit');
  }
  
    public function update(Request $request)
  {
      return view('admin.movie.edit');
  }
  
    
  public function index(Request $request)
  {
      return view('admin.movie.index');
  }
  
  public function list(Request $request)
  {
      return view('admin.movie.posted-movie');
  }
  
}