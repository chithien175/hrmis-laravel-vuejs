<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;

class MenuItem extends Model
{
    protected $fillable = ['menu_id', 'title', 'type', 'url', 'target', 'icon_class', 'color', 'parent_id', 'order'];

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
            ->with('children');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
