<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;


class LikeController extends Controller
{
    
public function like($id)
  {
    Like::create([
      'like_id' => $id,
      'user_id' => Auth::id(),
    ]);

    session()->flash('success', 'You Liked the Reply.');
    return redirect()->back();
  }

public function unlike($id)
  {
    $like = Like::where('like_id', $id)->where('user_id', Auth::id())->first();
    $like->delete();

    session()->flash('success', 'You Unliked the Reply.');

    return redirect()->back();
  }
  
}