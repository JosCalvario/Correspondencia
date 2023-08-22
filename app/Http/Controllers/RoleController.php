<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function index(){
        $roles = Role::all();
        $permi = Permission::all();
        return view('web.roles.index',[
            'roles' =>$roles,
            'permissions' => $permi
        ]);
    }
}
