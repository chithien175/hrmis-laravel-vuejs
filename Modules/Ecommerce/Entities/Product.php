<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Ecommerce\Entities\Category;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'code' , 'photo', 'description', 'body', 'publish', 'price', 'counter', 'user_id'
    ];

    function categories() {
        return $this->belongsToMany(Category::class, 'category_product')->withTimestamps();
    }
}
