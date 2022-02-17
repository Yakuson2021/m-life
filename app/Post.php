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
    
       public static $update_rules = array(
    
        'title' => 'required',
        'genre' => 'required',
        'musician' => 'required',
        'songtitle' => 'required',
    );
    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }
    
    public function comments()
    {
    return $this->hasMany('App\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag'); 
    }
}
