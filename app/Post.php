<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $table = "posts";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function likes()
    {
        return $this->hasMany('App\PostLike', 'post_id');
    }

    public function isCreatedBySelf()
    {
        if ($this->user_id == Auth::id()) {
            return true;
        } else {
            return false;
        }
    }

    public function isLiked()
    {
        if (PostLike::where('post_id', '=', $this->id)->where('user_id', '=', Auth::id())->exists()) {
            return true;
        } else {
            return false;
        }
    }
}
