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

    public static function sort_collection($idMenu)
    {
        // GET THE MENU - sort collection in blade
        $menu = static::where('id', '=', $idMenu)
            ->with(['parent_items.children' => function ($q) {
                $q->orderBy('order');
            }])
            ->first();
        return $menu;
    }
}
