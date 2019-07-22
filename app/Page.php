<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'photo', 'body', 'publish', 'counter', 'user_id', 'is_homepage',
    ];
}
