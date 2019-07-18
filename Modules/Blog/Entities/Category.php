<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id'];

    function posts() {
        return $this->belongsToMany(Post::class);
    }
}