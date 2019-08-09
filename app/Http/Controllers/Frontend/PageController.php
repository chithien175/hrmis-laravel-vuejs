<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    public function getHomePage()
    {
        $page = Page::where(['is_homepage' => true, 'publish' => 'publish'])->first();

        if($page){
            return $this->getOtherPage($page->slug);
        }
    }

    public function getOtherPage($pageSlug)
    {
        $page = Page::where(['slug'=> $pageSlug, 'publish' => 'publish'])->first();

        if($page){
            $page_view = 'katitheme.pages.' . $page->slug;
            return view($page_view)->with(['page_data' => $page]);
        }
    }
}
