<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Ecommerce\Entities\Product;

class Gallery extends Model
{
    protected $table = 'p_galleries';

    protected $fillable = [
        'name', 'product_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
