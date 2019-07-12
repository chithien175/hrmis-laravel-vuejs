<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
            Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Bật chức năng ' . $request['name'] . '.');
        }else{
            $module = \Module::find($request['slug'])->disable();
            Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tắt chức năng ' . $request['name'] . '.');
        }
        
        return ['message' => 'Đã toggle module'];
    }
}
