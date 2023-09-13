<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRolePermissionsRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function index(){
        return view('web.roles.index');
    }
    function updatePermissions(UpdateRolePermissionsRequest $request){
        $data = $request->all();
        $perm = $request->input('permissions');
        $role = Role::find($data['role_id']);
        $role->syncPermissions($perm);
        return redirect()->action([RoleController::class,'index'])->with('success','Permisos actualizados correctamente');
     
    }
}
