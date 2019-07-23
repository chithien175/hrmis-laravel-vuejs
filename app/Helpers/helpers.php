<?php

/**
 * @param
 * menuName: string
 * options: array(id, class, sub_id, sub_class)
 * @return string
 */
if (!function_exists('menu')) {
    function menu($menuName, $options)
    {
        $menu = Modules\Menu\Entities\Menu::display($menuName, $options);

        return $menu;
    }
}