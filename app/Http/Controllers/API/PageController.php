<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        return Page::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:pages'
        ]);

        $request['photo'] = ($request['photo'] == '') ? 'page-image-default.jpg' : $request['photo'];

        if($request->photo != 'page-image-default.jpg'){
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/page/').$name);

            $request->merge(['photo' => $name]);
        }

        $page = Page::create([
            'title'     => $request['title'],
            'slug'      => $request['slug'],
            'photo'     => $request['photo'],
            'body'      => $request['body'],
            'publish'   => $request['publish'],
            'counter'   => $request['counter'],
            'user_id'   => Auth::user()->id,
            'is_homepage' => $request['is_homepage']
        ]);

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo trang #' . $page->id . ' '. $page->title . '.');
        return ['message' => 'Tạo trang thành công'];
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:pages,slug,'.$page->id
        ]);

        $request['photo'] = ($request['photo'] == '') ? 'page-image-default.jpg' : $request['photo'];

        if($request->photo != $page->photo){
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/page/').$name);

            $request->merge(['photo' => $name]);

            $page_photo = public_path('images/page/').$page->photo;
            if(file_exists($page_photo) && $page->photo != 'page-image-default.jpg'){
                @unlink($page_photo);
            }
        }

        $page->update($request->all());

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa trang #' . $page->id . ' ' . $page->title);
        return ['message' => 'Đã chỉnh sửa trang thành công'];
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        $page_id = $page->id;
        $page_title = $page->title;

        $page_photo = public_path('images/page/').$page->photo;
        if(file_exists($page_photo) && $page->photo != 'page-image-default.jpg'){
            @unlink($page_photo);
        }

        $page->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa trang #' . $page_id . ' '. $page_title . '.');
        return ['message' => 'Đã xóa trang'];
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $pages = Page::where('title', 'like', "%$search%")
                        ->get();
        }

        return $pages;
    }
}
