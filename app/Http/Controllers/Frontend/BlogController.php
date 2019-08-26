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
            $post_previous = Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
            $post_next = Post::where('id', '>', $post->id)->orderBy('id')->first();

            $post_recent = Post::orderBy('id', 'desc')->limit(5)->get();

            $page_data = [
                'title' => $post['title'],
                'seo_title' => $post['seo_title'],
                'seo_description' => $post['seo_description'],
                'seo_keyword' => $post['seo_keyword']
            ];

            return view('katitheme.pages.post-detail')->with([
                'post'  => $post,
                'post_previous' => $post_previous,
                'post_next' => $post_next,
                'post_recent' => $post_recent,
                'page_data' => $page_data
            ]);
        }
        
    }
}
