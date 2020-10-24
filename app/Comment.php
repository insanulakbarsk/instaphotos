<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $table = "comments";

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function post(){
        return $this->belongsTo('App\Post', 'post_id');
    }

    public function likes(){
        return $this->hasMany('App\CommentLike', 'comment_id');
    }

    public function isLiked()
    {
        if (CommentLike::where('comment_id', '=', $this->id)->where('user_id', '=', Auth::id())->exists()) {
            return true;
        }else {
            return false;
        }
    }
}
