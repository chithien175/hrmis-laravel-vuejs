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

    function products_frontend(){
        return $this->belongsToMany(Product::class, 'category_product')->where('publish', 'publish')->orderBy('created_at', 'desc')->limit(8);
    }

    // **** FOR FRONTEND ****
    protected function getProductCategoryName($slug)
    {
        $category = static::where('slug', $slug)->first();

        return ($category) ? $category->name : false;
    }
}
