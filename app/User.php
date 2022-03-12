<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     //「$fillable」はホワイトリストとして利用できる。
     //指定したカラムに対してのみ、 create()やupdate() 、fill()が可能になる。
    protected $fillable = [
        'name', 'email', 'password','part','genre','introduction'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function likes()
    {
        return $this->belongsToMany('App\Post', 'likes', 'user_id', 'post_id');
    }
    
    public function favorites()
    {
        return $this->belongsToMany('App\Post', 'favorites', 'user_id', 'post_id');
    }
    
    
 
    public function getCommentsAmountNum(){
        $amount = 0;
        foreach($this->posts as $post){
        $count = $post->comments->count();
        $amount = $amount + $count;    
        }
        return $amount;
    }
    
    public static $update_rules = array(
    
        'name' => 'required',
        'email' => 'required',
    );
}
