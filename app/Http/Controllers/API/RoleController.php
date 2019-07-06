<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Role::with('permissions')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:roles',
            'display_name' => 'required|string|max:255|unique:roles'
        ]);

        $role = new Role();
        $role->name         = $request['name'];
        $role->display_name = $request['display_name'];
        $role->description  = $request['description'];
        

        if($role->save()){
            foreach($request['checked_permissions'] as $key => $permission){
                if($permission['checked'] == true){
                    $role->attachPermission($permission['id']);
                }
            }
        }
        
        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Tạo nhóm quyền #' . $role->id . ' '. $role->display_name . '.');
        return ['message' => 'Đã thêm quyền mới'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:255|unique:roles,name,'.$role->id,
            'display_name' => 'required|string|max:255|unique:roles,display_name,'.$role->id
        ]);

        if($role->update($request->all())){
            $role->detachPermissions($role->permissions);

            foreach($request['checked_permissions'] as $key => $permission){
                if($permission['checked'] == true){
                    $role->attachPermission($permission['id']);
                }
            }
        }

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Sửa nhóm quyền #' . $role->id . ' '. $role->display_name . '.');
        return ['message' => 'Đã cập nhật nhóm quyền'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $id = $role->id;
        $display_name = $role->display_name;

        $role->delete();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Xóa nhóm quyền #' . $id . ' '. $display_name . '.');
        return ['message' => 'Đã xóa nhóm quyền'];
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $roles = Role::where('display_name', 'like', "%$search%")
                        ->get();
        }

        return $roles;
    }

    public function getPermissions()
    {
        $permissions = Permission::all();
        return $permissions;
    }
}
