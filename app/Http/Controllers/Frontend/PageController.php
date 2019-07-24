<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    public function home()
    {
        $home_data = Page::where(['is_homepage' => true, 'publish' => 'publish'])->first();
        if(!isset($home_data)){
            return abort(404);
        }
        return view('katitheme.pages.home')->with(['home_data' => $home_data]);
    }

    public function about()
    {
        return view('katitheme.pages.about');
    }

    public function news()
    {
        return view('katitheme.pages.news');
    }

    public function contact()
    {
        return view('katitheme.pages.contact');
    }
}
