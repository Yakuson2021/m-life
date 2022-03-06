<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// 以下を追記することでPost Modelと、TagModelが扱えるようになる
use App\Post;
use App\Tag;


class MovieController extends Controller
{
  // public functionとは「このアクションのときはこうするよ」というメソッドの宣言　
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
      //storeは引数の場所に保存するメソッド//
      //public/movieに保存したデータの、実際の保存場所を返してそれをPathに代入している
        $path = $request->file('movie')->store('public/movie');
        //代入されたPathからファイル名だけを取り出すメソッドがbasename。
        //結果としてデータベースに保存されるのがファイル名
        $post->movie = basename($path);
        
        } else {
          $post->movie = null;
      }

      // フォームから送信されてきたimageを削除する
      unset($form['movie']);
      unset($form['tags']);
      // データベースに保存する
      $post->fill($form);
      $post->save();
      
        // #(ハッシュタグ)で始まる単語を取得。結果は、$matchに多次元配列で代入される。
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tags, $match);
        // dd($match);
        //$match[0]に#(ハッシュタグ)あり、$match[1]に#(ハッシュタグ)なしの結果が入ってくるので、$match[1]で#(ハッシュタグ)なしの結果のみを使います。
        $tags = [];
        foreach ($match[1] as $tag) {
        $record = Tag::firstOrCreate(['name' => $tag]);//firstOrCreateメソッドで、tags_tableのnameカラムに該当のない$tagは新規登録される。
        $post->tags()->attach($record->id);    
            
        array_push($tags, $record);// $recordを配列に追加します(=$tags)
        };

        // 投稿に紐付けされるタグのidを配列化
        $tags_id = [];
        foreach ($tags as $tag) {
            array_push($tags_id, $tag['id']);
        };
      return redirect('admin/movie/posted-movie');
    }
    

public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する（「!= ''」→「''じゃなければ」）
          $posts = Post::where('songtitle', 'like', "%$cond_title%")->get();
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
      // dd($request->all());←これはチェックのためにプログラムを停止させるために書いたもの　普段使わない
      // Validationをかける
      $this->validate($request, Post::$update_rules);
      // Post Modelからデータを取得する
      $post = Post::find($request->id);
      // 送信されてきたフォームデータを格納する
      // $post_formが変数であるということを定義する
      $post_form = $request->all();
      
      if ($request->file('movie')) {
          $path = $request->file('movie')->store('public/movie');
          $post->movie = basename($path);
     } else {
          $post_form['movie'] = $post->movie;
          // $post->movie = null;
          
  }
      unset($post_form['movie']);
      unset($post_form['_token']);
      $post->fill($post_form)->save();
      return redirect('admin/movie/posted-movie');
  }
  
  //自分の投稿した動画の一覧画面を表示させるメソッド//
  public function list(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
  // 検索されたら検索結果を取得する（「!= ''」→「''じゃなければ」）
  // もし検索されたら検索結果を取得する
  //ユーザーID(自分)に紐づく動画であれば動画を取ってくる//
      // $posts = Post::where('user_id', Auth::user())->get();←もう一つのやり方
      $posts = Post::where('user_id', Auth::id())->get();
      } else {
  // それ以外はすべてのニュースを取得する
      $posts = Post::all();
      }

     // 自分の動画一覧画面（admin.movie.posted-movie）に表示する//
      return view('admin.movie.posted-movie', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  public function delete(Request $request)
  {
    
    // 2/22、このサイトより拝借中（実装作業中）https://techacademy.jp/magazine/50017#sec2
      // let result = confirm('削除しますか');
      // if(result){
      //   console.log('削除しました');
      // }else{
      //   console.log('削除をとりやめました');
      // }
      
      // 該当するPost Modelを取得
      $posts = Post::find($request->id);
      // 削除する
      $posts->delete();
      

      return redirect('admin/movie/posted-movie');
  }
  
  //特定の投稿者が投稿した動画一覧表示（3/6追加）
   public function posted_personal(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
  // 検索されたら検索結果を取得する（「!= ''」→「''じゃなければ」）
  // もし検索されたら検索結果を取得する
  //渡されたユーザの設定→リンクを実装する部分//
      $posts = Post::where('user_id', $request->id)->get();
      } else {
  // それ以外はすべてのニュースを取得する
      $posts = Post::all();
      }
     // 該当の動画一覧画面（admin.movie.posted_personal）に表示する//
      return view('admin.movie.posted_personal', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
    
}