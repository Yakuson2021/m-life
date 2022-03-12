<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
class CommentsController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
   public function store(Request $request)
   {
       //↓Comment(モデルファイルのclass名とリンクさせているので「new Comment()」、)
       $comment = new Comment();
       //↓$request->comment;→コメント入力フォームで入力されたコメントフォーム（viewファイルから取ってきている）
       $comment->comment = $request->comment;
       $comment->post_id = $request->post_id;
       $comment->user_id = Auth::user()->id;
       $comment->save();

       return redirect('admin/movie/detail?id=' . $comment->post_id);
      
   }
   
    public function destroy(Request $request)
    {
        $comment = new Comment();
        if (Auth::user()->id == $comment->user_id);
        {                
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        }

        return redirect()->back();
    }
    
}
