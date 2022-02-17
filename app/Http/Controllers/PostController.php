<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//追加
use Illuminate\Support\Facades\DB;//追加

use App\Tag;//追加
use App\Post;//追加

class PostController extends Controller
{
    
    // 投稿の作成画面の表示
    public function create()
    {
        return view('admin/movie/post');
    }
    
    // 投稿のDBへのレコード作成
    public function store(Request $request)
     {
        $post = $request->validate([
            // 'title' => 'required|max:50',
            // 'body' => 'required|max:2000',
            // ★2/14　ここに何をいれるべきか？↑
            
            ]);
    
        // #(ハッシュタグ)で始まる単語を取得。結果は、$matchに多次元配列で代入される。
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tags, $match);
        //$match[0]に#(ハッシュタグ)あり、$match[1]に#(ハッシュタグ)なしの結果が入ってくるので、$match[1]で#(ハッシュタグ)なしの結果のみを使います。
        $tags = [];
        foreach ($match[1] as $tag) {
            $record = Tag::firstOrCreate(['name' => $tag]);//firstOrCreateメソッドで、tags_tableのnameカラムに該当のない$tagは新規登録される。
        array_push($tags, $record);// $recordを配列に追加します(=$tags)
        };

        // 投稿に紐付けされるタグのidを配列化
        $tags_id = [];
        foreach ($tags as $tag) {
            array_push($tags_id, $tag['id']);
        };
   
   // 投稿はposts_tableへレコードしましょう。
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save();
        $post->tags()->attach($tags_id);//投稿ににタグ付するために、attachメソッドをつかい、モデルを結びつけている中間テーブルにレコードを挿入します。
        
        return redirect()->route('admin/movie/posted-movie');
     }
}        // ↑一応「投稿画面」のURLを入れてみた　参考サイトでは「return redirect()->route('top');」