<?php

/**
 * @param
 * $menuName: string
 * $options: [$id, $class, $sub_id, $sub_class] array
 * @return string
 */
if (!function_exists('menu')) {
    function menu($menuName, $options)
    {
        $menu = Modules\Menu\Entities\Menu::display($menuName, $options);

        echo $menu;
    }
}