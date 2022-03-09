<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//異なるnamespace のclass使っている場合、useを記載する
//自分のnamespaceと使いたいnamespaceが一致しているかどうか
use App\Favorite;
use Auth;
class FavoriteController extends Controller
{
public function favorite($id)
 {
//↓データベースに保存するためのメソッド
    Favorite::create([
      'post_id' => $id,
      'user_id' => Auth::id(),
    ]);
    
    return redirect()->back();
 }
 
public function unfavorite($id)
  {
    $favorite = Favorite::where('post_id', $id)->where('user_id', Auth::id())->first();
    $favorite->delete();

    //↓今回は不要
    // session()->flash('success', 'You Liked the Reply.');
    return redirect()->back();
  }

}