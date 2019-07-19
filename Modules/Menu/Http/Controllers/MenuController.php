<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Modules\Menu\Entities\Menu;

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
        return ['message' => 'Tạo trình thành công'];
    }

    public function show($id)
    {
        return Menu::with('items')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255|unique:menus,name,'.$menu->id,
        ]);

        $menu->update($request->all());

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Chỉnh sửa chuyên mục #' . $menu->id . ' ' . $menu->name);
        return ['message' => 'Đã chỉnh sửa trình đơn thành công'];
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $menu_id = $menu->id;
        $menu_name = $menu->name;

        $menu->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa chuyên mục #' . $menu_id . ' '. $menu_name . '.');
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
}
