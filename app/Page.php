<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'photo', 'body', 'publish', 'counter', 'user_id', 'is_homepage', 'seo_title', 'seo_description', 'seo_keyword'
    ];

    public function fields()
    {
        return $this->hasMany('App\PageCustomField')->orderBy('order', 'asc');
    }
}
