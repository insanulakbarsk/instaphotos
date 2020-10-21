<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $guarded = []; 

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }
}
