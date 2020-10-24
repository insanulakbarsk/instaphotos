<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function tagged_post()
    {
        return PostTag::where('tag_id', '=', $this->id)->get();
    }

    public function tagged_post_count()
    {
        return PostTag::where('tag_id', '=', $this->id)->get()->count();
    }
}
