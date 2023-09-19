<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "cpa";
        $user->email = "cpa@correo.com";
        $user->password=Hash::make('1234');
        $user->area_id=null;
        $user->save();
        $user->assignRole('Administrador');

        $user = User::create([
            'name' => 'Ana Karen Mora',
            'email' => 'ana.mora@puebla.gob.mx',
            'password' => Hash::make('1234'),
            'area_id' => null
        ])->assignRole('Recepcionista');

        $user = User::create([
            'name' => 'Marcela Mejía Zepeda',
            'email' => 'marcela.mejia@puebla.gob.mx',
            'password' => Hash::make('1234'),
            'area_id' => null
        ])->assignRole('Administrador');
        
        $user = User::create([
            'name' => 'rodos',
            'email' => 'rodos@correo.com',
            'password' => Hash::make('1234'),
            'area_id' => 2
        ])->assignRole('Analista');
    }
}
