<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Ecommerce\Entities\Product;
use Modules\Ecommerce\Entities\Category;

class Category extends Model
{
    protected $table = 'p_categories';

    protected $fillable = ['name', 'slug', 'parent_id'];

    function products() {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')
            ->with('children');
    }

    public static function sort_collection()
    {
        // GET THE MENU - sort collection in blade
        $categories = Category::where('parent_id', 0)
            ->with(['children' => function ($q) {
                $q->orderBy('created_at');
            }])
            ->get();
        return $categories;
    }

    // **** FOR FRONTEND ****
    protected function getProductCategoryName($slug)
    {
        $category = static::where('slug', $slug)->first();

        return ($category) ? $category->name : false;
    }
}
