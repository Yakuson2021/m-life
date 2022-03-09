<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  // 配列内の要素を書き込み可能にする
  //$fillable→決まった変数名　配列のカラム名を代入可能にする特定の変数名
  protected $fillable = ['post_id','user_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
    
}
