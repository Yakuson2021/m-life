<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
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
    
    public function is_liked_by_auth_user()
    {
    $id = Auth::id();
    $likers = array();
    foreach($this->likes as $like) {
    array_push($likers, $like->user_id);
    }
      if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
    
    }
    
    public function is_favorited_by_auth_user()
    {
    $id = Auth::id();
    $favorites = array();
    foreach($this->favorites as $favorite) {
    array_push($favorites, $favorite->user_id);
    }
      if (in_array($id, $favorites)) {
      return true;
    } else {
      return false;
    }
    
    }
    
     public function favorites()
    {
        return $this->hasMany(Favorite::class, 'post_id');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
        // return $this->belongsToMany('App\User', 'likes');
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