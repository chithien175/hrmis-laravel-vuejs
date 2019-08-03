<?php

namespace Modules\Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Modules\Ecommerce\Entities\Product;
use Modules\Ecommerce\Entities\Category;
use Modules\Ecommerce\Entities\Gallery;

class EcommerceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        return Product::with('categories')->with('galleries')->orderBy('id','desc')->paginate($request['per_page']);
    }

    public function store(Request $request)
    {
        // return ['data' => $request['checked_categories'] ];

        $request->validate([
            'name'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:products',
            'code'      => 'required|string|max:255|unique:products',
        ]);

        $request['photo'] = ($request['photo'] == '') ? 'product-image-default.jpg' : $request['photo'];

        if($request->photo != 'product-image-default.jpg'){
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/product/').$name);

            $request->merge(['photo' => $name]);
        }

        $product = Product::create([
            'name'          => $request['name'],
            'slug'          => $request['slug'],
            'code'          => $request['code'],
            'photo'         => $request['photo'],
            'description'   => $request['description'],
            'body'          => $request['body'],
            'publish'       => $request['publish'],
            'counter'       => $request['counter'],
            'price'         => $request['price'],
            'user_id'       => Auth::user()->id
        ]);

        // Thêm vào bảng p_categories
        foreach($request['checked_categories'] as $key => $category){
            if($category['checked'] == true){
                $product->categories()->attach($category['id']);
            }
        }

        // Thêm vào bảng p_galleries
        foreach($request['galleries'] as $key => $value){
            $photo_name = $key . '_' . time() . '.' . explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];

            \Image::make($value)->save(public_path('images/product/').$photo_name);

            $gallery = new Gallery;
            $gallery->name = $photo_name;
            $gallery->product_id = $product->id;
            $gallery->save();
        }

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo sản phẩm #' . $product->id . ' '. $product->name . '.');
        return ['message' => 'Tạo sản phẩm thành công'];
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:products,slug,'.$product->id,
            'code'      => 'required|string|max:255|unique:products,code,'.$product->id,
        ]);

        $request['photo'] = ($request['photo'] == '') ? 'product-image-default.jpg' : $request['photo'];

        if($request->photo != $product->photo){
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/product/').$name);

            $request->merge(['photo' => $name]);

            $product_photo = public_path('images/product/').$product->photo;
            if(file_exists($product_photo) && $product->photo != 'product-image-default.jpg'){
                @unlink($product_photo);
            }
        }

        if($product->update($request->all())){

            // check categories
            $product->categories()->detach();
            foreach($request['checked_categories'] as $key => $category){
                if($category['checked'] == true){
                    $product->categories()->attach($category['id']);
                }
            }

            // check galleries
            $galleries = $product->galleries;
            foreach($request['galleries'] as $key => $value){
                $check_photo = Gallery::where('name', $value)->first();
                if(!$check_photo){
                    $photo_name = $key . '_' . time() . '.' . explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
                    \Image::make($value)->save(public_path('images/product/').$photo_name);

                    $gallery = new Gallery;
                    $gallery->name = $photo_name;
                    $gallery->product_id = $product->id;
                    $gallery->save();
                }
            }

            foreach($request['del_galleries'] as $key => $value){
                $check_photo = Gallery::where('name', $value)->first();
                if($check_photo){
                    if(file_exists(public_path('images/product/').$check_photo->name)){
                        @unlink(public_path('images/product/').$check_photo->name);
                    }

                    $check_photo->delete();
                }
            }
        }

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa sản phẩm #' . $product->id . ' ' . $product->name);
        return ['message' => 'Đã chỉnh sửa sản phẩm thành công'];
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product_id = $product->id;
        $product_name = $product->name;

        $product_photo = public_path('images/product/').$product->photo;
        if(file_exists($product_photo) && $product->photo != 'product-image-default.jpg'){
            @unlink($product_photo);
        }

        //Xóa ảnh galleries
        foreach($product->galleries as $key => $value){
            if(file_exists(public_path('images/product/').$value->name)){
                @unlink(public_path('images/product/').$value->name);
            }
        }

        $product->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa bài viết #' . $product_id . ' '. $product_name . '.');
        return ['message' => 'Đã xóa sản phẩm'];
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $products = Product::with('categories')->where('name', 'like', "%$search%")
                        ->paginate(50);
        }

        return $products;
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

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo danh mục #' . $category->id . ' '. $category->name . '.');
        return ['message' => 'Tạo danh mục thành công'];
    }

    public function cateUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:categories,slug,'.$category->id,
        ]);

        $category->update($request->all());

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa danh mục #' . $category->id . ' ' . $category->name);
        return ['message' => 'Đã chỉnh sửa danh mục thành công'];
    }

    public function cateDestroy($id)
    {
        $category = Category::findOrFail($id);

        $category_id = $category->id;
        $category_name = $category->name;

        if($id != 1){
            $category->delete();
        }

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa danh mục #' . $category_id . ' '. $category_name . '.');
        return ['message' => 'Đã xóa danh mục'];
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

    public function galleryStore(Request $request){
        return 1;
    }
}
