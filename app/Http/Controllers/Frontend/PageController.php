<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('katitheme.pages.home');
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
