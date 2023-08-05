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

        $sections = ['roles', 'areas', 'documents', 'users'];

        foreach ($sections as $key => $section) {
            $permissions[$section] = [
                'index'=> Permission::create(['name' => 'index-'. $section]),
                'create'=> Permission::create(['name' => 'create-'. $section]),
                'store'=> Permission::create(['name' => 'store-' . $section]),
                'edit'=> Permission::create(['name' => 'edit-' . $section]),
                'update'=> Permission::create(['name' => 'update-' . $section]),
                'delete'=> Permission::create(['name' => 'delete-' . $section]),
                'destroy'=> Permission::create(['name' => 'destroy-' . $section]),
            ];
        }

        //Roles y asignación de permisos
        Role::create([
            'name' => 'admin'
        ])->givePermissionTo([Permission::all()]); //asignación de todos los permisos
         
        Role::create([
            'name' => 'recepcionist'
        ]);
        Role::create([
            'name' => 'manager'
        ]);
        Role::create([
            'name' => 'analist'
        ]);

        
    }
}
