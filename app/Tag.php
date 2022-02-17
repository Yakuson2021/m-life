<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
protected $fillable = ['name']; //保存したいカラム名が1つの場合

public function posts()
    {
        return $this->belongsToMany('App\Post'); 
    }
}
