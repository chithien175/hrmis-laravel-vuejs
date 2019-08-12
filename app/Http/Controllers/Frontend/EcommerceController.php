<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Ecommerce\Entities\Product;
use Modules\Ecommerce\Entities\Category;

class EcommerceController extends Controller
{
    public function getProductsByCategory($cateSlug)
    {  
        $category = Category::where('slug', $cateSlug)->first();

        if($category){
            $products = $category->products()->where('publish', 'publish')->orderBy('created_at', 'desc')->paginate(9);

            $page_data = [
                'title' => $category['name'],
                'seo_title' => $category['name'],
                'seo_description' => $category['name'],
                'seo_keyword' => $category['name']
            ];

            return view('katitheme.pages.p-category')->with([
                    'page_data' => $page_data,
                    'products'  => $products
                ]);
        }
    }

    public function getProductDetail($productSlug)
    {
        $product = Product::where(['slug' => $productSlug, 'publish' => 'publish'])->with('galleries')->with('categories')->first();

        if($product){
            $page_data = [
                'title' => $product['name'],
                'seo_title' => $product['name'],
                'seo_description' => $product['name'],
                'seo_keyword' => $product['name']
            ];
            
            $related_product = $product['categories'][0]->products()->where('publish', 'publish')->orderBy('created_at', 'desc')->get();

            return view('katitheme.pages.product-detail')->with([
                'product'  => $product,
                'related_product' => $related_product,
                'categories'=> $product['categories'],
                'galleries'=>  $product['galleries'],
                'page_data'=> $page_data
            ]);
        }
    }
}
