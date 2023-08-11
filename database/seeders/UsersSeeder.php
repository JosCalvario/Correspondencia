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
        $user->area_id="1";
        $user->save();
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'rodo',
            'email' => 'rodo@correo.com',
            'password' => Hash::make('1234'),
            'area_id' => 1
        ])->assignRole('recepcionist');

    }
}
