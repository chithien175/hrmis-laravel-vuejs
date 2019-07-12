<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Permission;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function toggle(Request $request)
    {
        if($request['status']){
            $module = \Module::find($request['slug'])->enable();

            $permission = Permission::create([
                'name'          => 'manage-blog',
                'display_name'  => 'Manage Blog',
                'description'   => 'Quản lý blog',
            ]);
            foreach( Role::all() as $role ){
                $role->attachPermission($permission);
            }

            Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Bật chức năng ' . $request['name'] . '.');
        }else{
            $module = \Module::find($request['slug'])->disable();

            $permission = Permission::where('name', 'manage-'.$request['slug'])->delete();

            Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tắt chức năng ' . $request['name'] . '.');
        }
        
        return ['message' => 'Đã toggle module'];
    }
}
