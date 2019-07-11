<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Category;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'photo', 'body', 'publish', 'counter', 'user_id',
    ];

    function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
