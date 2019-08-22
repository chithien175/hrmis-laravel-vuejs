<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Ecommerce\Entities\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q');
        $products = Product::where('name', 'LIKE', '%'.$q.'%')->paginate(9); 

        $page_data = [
            'title' => 'Tìm kiếm',
            'seo_title' => 'Tìm kiếm',
            'seo_description' => 'Tìm kiếm',
            'seo_keyword' => 'Tìm kiếm'
        ];

        return view('katitheme.pages.search-detail')->with([
            'products' => $products,
            'page_data' => $page_data
        ]);
    }
}
