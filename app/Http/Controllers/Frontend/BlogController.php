<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Category;

class BlogController extends Controller
{
    public function getPostDetail($postSlug)
    {
        $post = Post::where(['slug' => $postSlug, 'publish' => 'publish'])->first();

        return view('katitheme.pages.post-detail')->with([
            'post'  => $post
        ]);
    }
}
