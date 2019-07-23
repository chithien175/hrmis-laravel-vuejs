<?php

if (!function_exists('menu')) {
    function menu($menuName, $options)
    {
        $menu = Modules\Menu\Entities\Menu::display($menuName, $options);

        return $menu;
    }
}