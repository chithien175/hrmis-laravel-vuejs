<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blog\Entities\Post;
use Modules\Ecommerce\Entities\Product;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = [];

        if(\Module::find('blog')->get('active')){
            $post_number = Post::get()->count();
            $data['post_number'] = $post_number;
        }

        if(\Module::find('ecommerce')->get('active')){
            $product_number = Product::get()->count();
            $data['product_number'] = $product_number;
        }

        return response()->json($data);
    }
}
