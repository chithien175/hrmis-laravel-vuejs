<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageCustomField extends Model
{
    protected $fillable = [
        'key', 'display_name', 'value', 'type', 'order', 'page_id'
    ];

    // **** FOR FRONTEND ****
    protected function display($key){
        
        $field = static::where('key', $key)->first();
        
        return ($field) ? ($field->type == 'image') ? asset('images/page/' . $field->value) : $field->value : false;
    }
}
