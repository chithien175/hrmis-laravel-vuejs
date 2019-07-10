<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'photo', 'body', 'publish', 'counter', 'user_id',
    ];

    function categories() {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
}
