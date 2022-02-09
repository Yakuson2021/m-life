<?php
//2022/2/8,作成//

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  public function likes()
  {
    return $this->hasMany(Like::class, 'reply_id');
  }
}
