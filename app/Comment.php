<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user() //given the current comment grab user associated
    {
        return $this->belongsTo(User::class);
    }
}
