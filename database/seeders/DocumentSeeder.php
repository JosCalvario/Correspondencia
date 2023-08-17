<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DocumentType;
use App\Models\Request;
use App\Models\Unit;
use Carbon\Carbon;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'name'=>'asd',
            'abbr'=>'SC'
        ]);
        Area::create([
            'name'=>'Area 1',
            'manager_id'=> 1,
            'phone' => '1234567890',
            'address'=>'Dirección 1',
            'unit_id'=>1,
            'abbr' =>'DGCP'
        ]);
        Area::create([
            'name'=>'Area 2',
            'manager_id'=> 2,
            'phone' => '1234567891',
            'address'=>'Dirección 2',
            'unit_id'=>1,
            'abbr' =>'ABC'
        ]);
        Request::create([
            'folio' => 1,
            'name'=> 'name',
            'document_type'=> 'Oficio',
            'dependency' => 'SC',
            'department' => 'CG',
            'date' => Carbon::now(),
            'number'=> 1,
            'sender'=>'Rodolfo Pulido',
            'sender_position' => 'Administrador',
            'theme' => 'Documentación',
            'subject'=> 'Documentar',
            'assigned_area' => 1,
            'observations' => 'os',
            'document'=>'asd'
        ]);

        Request::create([
            'folio' => 2,
            'name'=> 'Oficio-SC-CG-2023',
            'document_type'=> 'Oficio',
            'dependency' => 'SC',
            'department' => 'CG',
            'date' => Carbon::now(),
            'number'=> 2,
            'sender'=>'Rodolfo Pulido',
            'sender_position' => 'Administrador',
            'theme' => 'Documentación',
            'subject'=> 'Documentar',
            'assigned_area' => 2,
            'observations' => 'os',
            'document'=>'assd'
        ]);
    }
}
