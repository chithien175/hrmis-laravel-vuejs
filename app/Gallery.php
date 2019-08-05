<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title', 'slug', 'publish'
    ];

    public function items()
    {
        return $this->hasMany('App\GalleryItem')->orderBy('order', 'asc');
    }

    // **** FOR FRONTEND ****
    protected function display($slug){
        
        $images = static::where([ 'slug' => $slug, 'publish' => 'publish' ])->first();
        
        return ($images) ? $images->items : false;
    }
}
