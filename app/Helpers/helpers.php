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
        return (Module::find('menu')->get('active')) ? Modules\Menu\Entities\Menu::display($menuName, $options) : false;
    }
}

/**
 * @param
 * $key: string
 * @return string
 */
if (!function_exists('getFieldPage')) {
    function getFieldPage($key)
    {
        $value = App\PageCustomField::display($key);

        return $value;
    }
}

/**
 * @param
 * $key: string
 * @return string
 */
if (!function_exists('getFieldCompany')) {
    function getFieldCompany($key)
    {
        $value = setting()->get($key);

        return ($value) ? $value : false;
    }
}

/**
 * @param
 * null
 * @return array
 */
if (!function_exists('getAllPosts')) {
    function getAllPosts($paginate)
    {
        $posts = Modules\Blog\Entities\Post::getAll($paginate);

        return (Module::find('blog')->get('active')) ? $posts : false;
    }
}