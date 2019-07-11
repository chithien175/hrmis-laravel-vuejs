<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\Entities\Post;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Post::with('categories')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:posts',
            'body'      => 'required'
        ]);

        $request['photo'] = ($request['photo'] == '') ? 'post-image-default.jpg' : $request['photo'];

        if($request->photo != 'post-image-default.jpg'){
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/post/').$name);

            $request->merge(['photo' => $name]);
        }

        $post = Post::create([
            'title'     => $request['title'],
            'slug'      => $request['slug'],
            'photo'     => $request['photo'],
            'body'      => $request['body'],
            'publish'   => $request['publish'],
            'counter'   => $request['counter'],
            'user_id'   => Auth::user()->id
        ]);

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo bài viết #' . $post->id . ' '. $post->title . '.');
        return ['message' => 'Tạo bài viết thành công'];
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:posts,slug,'.$post->id,
            'body'      => 'required'
        ]);

        $request['photo'] = ($request['photo'] == '') ? 'post-image-default.jpg' : $request['photo'];

        if($request->photo != $post->photo){
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/post/').$name);

            $request->merge(['photo' => $name]);

            $post_photo = public_path('images/post/').$post->photo;
            if(file_exists($post_photo) && $post->photo != 'post-image-default.jpg'){
                @unlink($post_photo);
            }
        }

        $post->update($request->all());

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa bài viết #' . $post->id . ' ' . $post->title);
        return ['message' => 'Đã chỉnh sửa bài viết thành công'];
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post_id = $post->id;
        $post_title = $post->title;

        $post_photo = public_path('images/post/').$post->photo;
        if(file_exists($post_photo) && $post->photo != 'post-image-default.jpg'){
            @unlink($post_photo);
        }

        $post->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa bài viết #' . $post_id . ' '. $post_title . '.');
        return ['message' => 'Đã xóa bài viết'];
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $posts = Post::with('categories')->where('title', 'like', "%$search%")
                        ->get();
        }

        return $posts;
    }
}
