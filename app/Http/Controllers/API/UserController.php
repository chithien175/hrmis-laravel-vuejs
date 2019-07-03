<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        return User::with('roles')->get();
        
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
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|max:191',
            'type'      => 'required'
        ]);

        $user = new User;
        $user = User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'bio'       => $request['bio'],
            'photo'     => ($request['photo'] == '') ? 'profile.png' : $request['photo'],
            'password'  => Hash::make($request['password']),
            'status'    => $request['status'],
        ]);

        $user->attachRole($request->type);

        return ['message' => 'Tạo người dùng thành công'];
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
        $user = User::with('roles')->findOrFail($id);

        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password'  => 'sometimes|min:8|max:191',
            'type'      => 'required'
        ]);

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->detachRole($user['roles'][0]);
        $user->attachRole($request['type']);

        $user->update($request->all());
        return ['message' => 'Đã cập nhật người dùng'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return ['message' => 'Đã xóa người dùng'];
    }

    public function getProfile()
    {
        return auth('api')->user();
    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();

        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password'  => 'sometimes|confirmed|min:8|max:191'
        ]);

        if($request->photo != $user->photo){
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/profile/').$name);

            $request->merge(['photo' => $name]);

            $user_photo = public_path('images/profile/').$user->photo;
            if(file_exists($user_photo) && $user->photo != 'profile.png'){
                @unlink($user_photo);
            }
        }

        if(!empty($request->password)){
            $request->merge([
                'password' => Hash::make($request['password']),
                'password_confirmation' => Hash::make($request['password_confirmation'])
            ]);
        }

        $user->update($request->all());

        return ['message' => 'Đã cập nhật thông tin cá nhân'];
    }

    public function search()
    {
        if($search = \Request::get('q')){
            $users = User::with('roles')->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->get();
        }

        return $users;
    }
}
