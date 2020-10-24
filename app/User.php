<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username', 'password',
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

    public function profile()
    {
        return $this->hasOne('App\Profile', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }

    public function follows()
    {
        return $this->hasMany('App\Follow', 'follow', 'user_id', 'follower_user_id');
    }

    public function isFollowed()
    {
        if (Follow::where('user_id', '=', $this->id)->where('follower_user_id', '=', Auth::id())->exists()) {
            return true;
        } else {
            return false;
        }
    }
}
