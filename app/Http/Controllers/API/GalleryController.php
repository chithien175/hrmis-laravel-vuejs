<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Gallery;
use App\GalleryItem;

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

    public function getImagesByGalleryId($id)
    {
        return Gallery::findOrFail($id)->items;
    }

    public function createCustomImage(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
        ]);

        $gallery = Gallery::findOrFail($request['gallery_id']);

        if( $gallery ){
            $request['image'] = ($request['image'] == '') ? 'gallery-image-default.jpg' : $request['image'];

            if($request->image != 'gallery-image-default.jpg'){
                $name = $gallery['id'] . '_' . time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

                \Image::make($request->image)->save(public_path('images/gallery/').$name);

                $request->merge(['image' => $name]);
            }

            $image = GalleryItem::create([
                'title'         => $request['title'],
                'description'   => $request['description'],
                'image'         => $request['image'],
                'order'         => $request['order'],
                'gallery_id'    => $gallery['id']
            ]);
        }

        return ['message' => 'Đã thêm ảnh vào gallery'];
    }

    public function orderImagesGallery(Request $request){
        $images = $request['galleryImages'];

        foreach($images as $key => $image){
            $item = GalleryItem::findOrFail($image['id']);
            $item->order = $key+1;
            $item->save(); 
        }

        return ['message' => 'Đã sắp xếp ảnh tùy chỉnh'];
    }

    public function deleteImageGallery($id)
    {
        $image = GalleryItem::findOrFail($id);

        $photo = public_path('images/gallery/').$image->image;
        if(file_exists($photo) && $photo != 'gallery-image-default.jpg'){
            @unlink($photo);
        }

        $image->delete();

        return ['message' => 'Đã xóa ảnh'];
    }
}
