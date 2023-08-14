<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function index() {
        $users = User::all();
        $areas = Area::all();
        $roles = Role::all();
        return view('web.users.index',[
            'users' => $users,
            'areas' => $areas,
            'roles' => $roles
        ]);
    }

    function store(StoreUserRequest $request) {
        $data = $request->all();
        unset($data['password_confirmation']);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->action([UserController::class,'index'])->with('success','Usuario creado exitosamente');
    }
}
