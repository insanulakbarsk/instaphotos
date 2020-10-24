<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = "follow";
    protected $fillable = [
        'user_id', 'follower_user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'follow', 'user_id', 'follower_user_id');
    }
}
