<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Gallery;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Gallery::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:galleries'
        ]);

        $gallery = Gallery::create([
            'title'             => $request['title'],
            'slug'              => $request['slug'],
            'publish'           => $request['publish'],
        ]);

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo bộ sưu tập ảnh #' . $gallery->id . ' '. $gallery->title . '.');
        return ['message' => 'Tạo trang thành công'];
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:galleries,slug,'.$gallery->id
        ]);

        $gallery->update($request->all());

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa bộ sưu tập ảnh #' . $gallery->id . ' ' . $gallery->title);
        return ['message' => 'Đã chỉnh sửa bộ sưu tập ảnh thành công'];
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        $gallery_id = $gallery->id;
        $gallery_title = $gallery->title;

        $gallery->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa bộ sưu tập ảnh #' . $gallery_id . ' '. $gallery_title . '.');
        return ['message' => 'Đã xóa bộ sưu tập ảnh'];
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $galleries = Gallery::where('title', 'like', "%$search%")
                        ->get();
        }

        return $galleries;
    }
}
