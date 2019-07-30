<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageCustomField extends Model
{
    protected $fillable = [
        'key', 'display_name', 'value', 'type', 'order', 'page_id'
    ];
}
