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

        if($post){
            $page_data = [
                'title' => $post['title'],
                'seo_title' => $post['title'],
                'seo_description' => $post['title'],
                'seo_keyword' => $post['title']
            ];

            return view('katitheme.pages.post-detail')->with([
                'post'  => $post,
                'page_data' => $page_data
            ]);
        }
        
    }
}
