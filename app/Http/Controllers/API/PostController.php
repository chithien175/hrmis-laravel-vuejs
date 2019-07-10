<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::with('categories')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->validate($request, [
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $id = $post->id;
        $title = $post->title;

        $post->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa bài viết #' . $id . ' '. $title . '.');
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
