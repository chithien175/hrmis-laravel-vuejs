<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Ecommerce\Entities\Product;

class Category extends Model
{
    protected $table = 'p_categories';

    protected $fillable = ['name', 'slug', 'parent_id'];

    function products() {
        return $this->belongsToMany(Product::class, 'category_product');
    }
}
