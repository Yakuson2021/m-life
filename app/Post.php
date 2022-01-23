<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 以下を追記
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'genre' => 'required',
        'musician' => 'required',
        'songtitle' => 'required',
        'movie' => 'required',
    );

}
