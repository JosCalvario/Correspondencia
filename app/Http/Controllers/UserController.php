<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateUserRolesRequest;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function index() {
        return view('web.users.index');
    }

    function store(StoreUserRequest $request) {
        $data = $request->all();
        unset($data['password_confirmation']);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->action([UserController::class,'index'])->with('success','Usuario creado exitosamente');
    }

    function update(UpdateUserRequest $request){
        $data = $request->all();
        unset($data['password_confirmation']);
        $user = User::find($data['user_id']);
        $user->update($data);

        return redirect()->action([UserController::class,'index'])->with('success','Usuario actualizado exitosamente');
    }

    function editRoles($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('web.users.editRoles',['user'=>$user,'roles'=>$roles]);
    }

    function updateRoles(UpdateUserRolesRequest $request){
        $data = $request->all();
        $roles = $request->input('roles');
        $user = User::find($data['user_id']);
        $user->roles()->sync($roles);

        return redirect()->action([UserController::class,'index'])->with('success','Roles actualizados exitosamente');
    }
}
