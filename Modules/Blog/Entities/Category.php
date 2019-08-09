<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'parent_id'];

    function posts() {
        return $this->belongsToMany(Post::class);
    }

    function posts_frontend(){
        return $this->belongsToMany(Post::class)->where('publish', 'publish')->orderBy('created_at', 'desc')->limit(3);
    }
}
