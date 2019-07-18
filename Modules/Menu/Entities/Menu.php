<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Menu\Entities\MenuItem;

class Menu extends Model
{
    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function parent_items()
    {
        return $this->hasMany(MenuItem::class)
            ->whereNull('parent_id');
    }
}
