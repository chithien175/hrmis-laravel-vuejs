<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return Menu::get();
    }

    public function store(Request $request)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
       
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
