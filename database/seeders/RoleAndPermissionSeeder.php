<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Permisos

        $sections = ['roles', 'areas', 'requests', 'users','responses','permissions'];

        foreach ($sections as $key => $section) {
            $permissions[$section] = [
                'index'=> Permission::create(['name' => $section.'.index']),
                //'create'=> Permission::create(['name' => $section.'.create']),
                'store'=> Permission::create(['name' => $section.'.store']),
                //'edit'=> Permission::create(['name' => $section.'.edit']),
                'update'=> Permission::create(['name' => $section.'.update']),
                //'delete'=> Permission::create(['name' => $section.'.delete']),
                'destroy'=> Permission::create(['name' =>  $section.'.destroy']),
            ];
        }
        $permissions['responses']['createFolio'] = Permission::create(['name'=> 'responses.createFolio']);

        //Roles y asignación de permisos
        Role::create([
            'name' => 'Administrador'
        ])->givePermissionTo([Permission::all()]); //asignación de todos los permisos
         
        Role::create([
            'name' => 'Recepcionista'
        ])->givePermissionTo($permissions['requests']);
        Role::create([
            'name' => 'Encargado de área'
        ]);
        Role::create([
            'name' => 'Analista'
        ])->givePermissionTo($permissions['responses']['createFolio']);
        Role::create([
            'name'=> 'Folios'
        ]);

        
    }
}
