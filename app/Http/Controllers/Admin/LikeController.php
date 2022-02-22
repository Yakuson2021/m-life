<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use Auth;
class LikeController extends Controller
{
    
/**
  * 引数のIDに紐づくリプライにLIKEする
  *
  * @param $id リプライID
  * @return \Illuminate\Http\RedirectResponse
  */
public function like($id)
  {
    Like::create([
      'post_id' => $id,
      'user_id' => Auth::id(),
    ]);

    session()->flash('success', 'You Liked the Reply.');
    return redirect()->back();
  }

public function unlike($id)
  {
    $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
    $like->delete();

    session()->flash('success', 'You Unliked the Reply.');

    return redirect()->back();
  }
  
}