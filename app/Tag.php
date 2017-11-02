<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tag extends Model
{
    public function getRouteKeyName()
    {
        return 'name';
    }
    
    public function posts()
    {
        //many to many relationship
        return $this->belongsToMany(Post::class);
    }
}
