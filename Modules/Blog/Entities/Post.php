<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Category;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'photo', 'description', 'body', 'publish', 'counter', 'user_id', 'seo_title', 'seo_description', 'seo_keyword'
    ];

    function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    // **** FOR FRONTEND ****
    protected function getAll($paginate)
    {
        $posts = static::where('publish', 'publish')->orderBy('id', 'desc')->with('categories')->paginate($paginate);

        return ($posts) ? $posts : false;
    }
}
