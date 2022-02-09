<?php
//2022/2/8,作成//
namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  // 配列内の要素を書き込み可能にする
  protected $fillable = ['post_id','user_id'];

  public function reply()
  {
    return $this->belongsTo(Reply::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
