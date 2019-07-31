<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    public function getHomePage()
    {
        $page = Page::where('is_homepage', true)->first();

        if($page){
            return $this->getOtherPage($page->slug);
        }
    }

    public function getOtherPage($pageSlug)
    {
        $page = Page::where('slug', $pageSlug)->first();

        if($page){
            $page_view = 'katitheme.pages.' . $page->slug;
            return view($page_view)->with(['page_data' => $page]);
        }
    }

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
