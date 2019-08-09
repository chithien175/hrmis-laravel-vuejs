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
 * $slug: string
 * @return array
 */
if (!function_exists('getGalleryBySlug')) {
    function getGalleryBySlug($slug)
    {
        $value = App\Gallery::display($slug);

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

/**
 * @param
 * $slug: string
 * @return array
 */
if (!function_exists('getPostByCategorySlug')) {
    function getPostByCategorySlug($slug)
    {
        $posts = Modules\Blog\Entities\Post::getPostByCategorySlug($slug);

        return (Module::find('ecommerce')->get('active')) ? $posts : false;
    }
}

/**
 * @param
 * $slug: string
 * @return array
 */
if (!function_exists('getProductByCategorySlug')) {
    function getProductByCategorySlug($slug)
    {
        $products = Modules\Ecommerce\Entities\Product::getProductByCategorySlug($slug);

        return (Module::find('ecommerce')->get('active')) ? $products : false;
    }
}

/**
 * @param
 * $slug: string
 * @return string
 */
if (!function_exists('getProductCategoryName')) {
    function getProductCategoryName($slug)
    {
        $category = Modules\Ecommerce\Entities\Category::getProductCategoryName($slug);

        return (Module::find('ecommerce')->get('active')) ? $category : false;
    }
}

/**
 * @param
 * $text: text
 * $max_length: number
 * $cut_off: string
 * $keep_word: boolean
 * @return text
 */
if(! function_exists('shorten_text')){
    function shorten_text($text, $max_length = 140, $cut_off = '...', $keep_word = false)
    {
        if(strlen($text) <= $max_length) {
            return $text;
        }

        if(strlen($text) > $max_length) {
            if($keep_word) {
                $text = substr($text, 0, $max_length + 1);

                if($last_space = strrpos($text, ' ')) {
                    $text = substr($text, 0, $last_space);
                    $text = rtrim($text);
                    $text .=  $cut_off;
                }
            } else {
                $text = substr($text, 0, $max_length);
                $text = rtrim($text);
                $text .=  $cut_off;
            }
        }

        return $text;
    }
}
