<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Category;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        return Post::with('categories')->orderBy('id','desc')->paginate($request['per_page']);
    }

    public function store(Request $request)
    {
        // return ['data' => $request['checked_categories'] ];

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
            'title'             => $request['title'],
            'slug'              => $request['slug'],
            'photo'             => $request['photo'],
            'description'       => $request['description'],
            'body'              => $request['body'],
            'publish'           => $request['publish'],
            'counter'           => $request['counter'],
            'user_id'           => Auth::user()->id,
            'seo_title'         => $request['seo_title'],
            'seo_description'   => $request['seo_description'],
            'seo_keyword'       => $request['seo_keyword']
        ]);

        foreach($request['checked_categories'] as $key => $category){
            if($category['checked'] == true){
                $post->categories()->attach($category['id']);
            }
        }

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

        if($post->update($request->all())){
            $post->categories()->detach();
            foreach($request['checked_categories'] as $key => $category){
                if($category['checked'] == true){
                    $post->categories()->attach($category['id']);
                }
            }
        }

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
                        ->paginate(50);
        }

        return $posts;
    }

    // CATEGORY
    public function cateIndex()
    {
        return Category::get();
    }

    public function cateStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:categories'
        ]);

        $category = Category::create([
            'name'     => $request['name'],
            'slug'      => $request['slug'],
            'parent_id'   => $request['parent_id'],
        ]);

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo chuyên mục #' . $category->id . ' '. $category->name . '.');
        return ['message' => 'Tạo chuyên mục thành công'];
    }

    public function cateUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:categories,slug,'.$category->id,
        ]);

        $category->update($request->all());

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa chuyên mục #' . $category->id . ' ' . $category->name);
        return ['message' => 'Đã chỉnh sửa chuyên mục thành công'];
    }

    public function cateDestroy($id)
    {
        $category = Category::findOrFail($id);

        $category_id = $category->id;
        $category_name = $category->name;

        if($id != 1){
            $category->delete();
        }

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa chuyên mục #' . $category_id . ' '. $category_name . '.');
        return ['message' => 'Đã xóa chuyên mục'];
    }

    public function cateSearch()
    {
        if($search = \Request::get('q')){
            $categories = Category::where('name', 'like', "%$search%")
                        ->get();
        }

        return $categories;
    }

    public function cateList()
    {
        return Category::all();
    }
}
