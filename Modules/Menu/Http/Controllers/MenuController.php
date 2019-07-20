<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Menu::get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255|unique:menus'
        ]);

        $menu = Menu::create([
            'name'     => $request['name'],
        ]);

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo trình đơn #' . $menu->id . ' '. $menu->name . '.');
        return ['message' => 'Tạo trình đơn thành công'];
    }

    public function show($id)
    {
        return Menu::sort_collection($id);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255|unique:menus,name,'.$menu->id,
        ]);

        $menu->update($request->all());

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa trình đơn #' . $menu->id . ' ' . $menu->name);
        return ['message' => 'Đã chỉnh sửa trình đơn thành công'];
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $menu_id = $menu->id;
        $menu_name = $menu->name;

        $menu->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa trình đơn #' . $menu_id . ' '. $menu_name . '.');
        return ['message' => 'Đã xóa trình đơn'];
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $menus = Menu::where('name', 'like', "%$search%")
                        ->get();
        }

        return $menus;
    }

    public function itemStore(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
        ]);
        
        $item = new MenuItem;
        
        $item->menu_id    = $request['menu_id'];
        $item->title      = $request['title'];
        $item->type       = $request['type'];
        $item->url        = $request['url'];
        $item->target     = $request['target'];
        $item->icon_class = $request['icon_class'];
        $item->color      = $request['color'];
        $item->order      = $request['order'];
        $item->route      = $request['route'];
        $item->parameters = $request['parameters'];
  
        $item->save();
        
        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo mục trình đơn #' . $item->id . ' '. $item->title . '.');
        return ['message' => 'Tạo mục trình đơn thành công'];
    }

    public function itemUpdate(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $item->menu_id    = $request['menu_id'];
        $item->title      = $request['title'];
        $item->type       = $request['type'];
        $item->url        = $request['url'];
        $item->target     = $request['target'];
        $item->icon_class = $request['icon_class'];
        $item->color      = $request['color'];
        $item->route      = $request['route'];
        $item->parameters = $request['parameters'];

        $item->save();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa mục trình đơn #' . $item->id . ' '. $item->title . '.');
        return ['message' => 'Chỉnh sửa mục trình đơn thành công'];
    }

    public function itemDestroy($id)
    {
        $item = MenuItem::findOrFail($id);

        $item_id = $item->id;
        $item_title = $item->title;

        $item->children()->delete();
        $item->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa mục trình đơn #' . $item_id . ' '. $item_title . '.');
        return ['message' => 'Đã xóa mục trình đơn'];
    }
}
