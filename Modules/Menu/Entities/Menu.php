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

    // For Frontend
    protected function display($menuName, $options)
    {
        // GET THE MENU - sort collection in blade
        $menu = static::where('name', '=', $menuName)
            ->with(['parent_items.children' => function ($q) {
                $q->orderBy('order');
            }])
            ->first()->toArray();

        // Check for Menu Existence
        if (!isset($menu)) {
            return false;
        }

        $menu_items = $menu['parent_items'];
        // return $menu_items;

        $menu_html = $this->renderMenu($menu_items, null, $options);

        return $menu_html;
    }

    protected function renderMenu(array $menuItems, $parentId, $options)
    {   
        if($parentId == null){
            $html= '<ul id="'.$options['id'].'" class="'.$options['class'].'">';
        }else{
            $html= '<ul id="'.$options['sub_id'].'" class="'.$options['sub_class'].'">';
        }
        
        foreach ($menuItems as $index => $menuItem) {
            
            if($menuItem['type'] == 'url'){
                $html.= '<li>';
                $html.= '<a href="'.$menuItem['url'].'" target="'.$menuItem['target'].'">'.$menuItem['title'];
            }
            if($menuItem['type'] == 'route'){
                $html.= (\Route::currentRouteName() == $menuItem['route']) ? '<li class="active">':'<li>';
                $html.= '<a href="'.route($menuItem['route']).'" target="'.$menuItem['target'].'">'.$menuItem['title'];
            }
            $html.= '</a>';
            $html.= (sizeof($menuItem['children'])) ? $this->renderMenu($menuItem['children'], $menuItem['id'], $options) : '';
            $html.= '</li>';
        }
        $html.= '</ul>';

        return $html;
    }
}
