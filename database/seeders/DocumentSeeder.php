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
            'name'=>'Secretaría de cultura',
            'abbr'=>'SC'
        ]);
        
        Area::create([
            'name'=>'Global',
            'manager_id'=> 1,
            'phone' => '1',
            'address'=>'1',
            'unit_id'=>1,
            'abbr' =>'GL'
        ]);
        Area::create([
            'name'=>'Dirección',
            'manager_id'=> null,
            'phone' => '-',
            'address'=>'-',
            'unit_id'=>1,
            'abbr' =>'DA'
        ]);
        Area::create([
            'name'=>'Subdirección',
            'manager_id'=> null,
            'phone' => '-',
            'address'=>'-',
            'unit_id'=>1,
            'abbr' =>'SUB'
        ]);
        Area::create([
            'name'=>'Recursos Materiales y Servicios Generales',
            'manager_id'=> null,
            'phone' => '-',
            'address'=>'-',
            'unit_id'=>1,
            'abbr' =>'RMySG'
        ]);
        Area::create([
            'name'=>'Recursos Humanos',
            'manager_id'=> null,
            'phone' => '-',
            'address'=>'-',
            'unit_id'=>1,
            'abbr' =>'RH'
        ]);
        Area::create([
            'name'=>'Planeación y Tecnologías de la Información',
            'manager_id'=> null,
            'phone' => '-',
            'address'=>'-',
            'unit_id'=>1,
            'abbr' =>'DGCP'
        ]);
        Area::create([
            'name'=>'Presupuesto y Contabilidad',
            'manager_id'=> null,
            'phone' => '-',
            'address'=>'-',
            'unit_id'=>1,
            'abbr' =>'PyC'
        ]);
        Area::create([
            'name'=>'Unis',
            'manager_id'=> null,
            'phone' => '-',
            'address'=>'-',
            'unit_id'=>1,
            'abbr' =>'UNIS'
        ]);
        Request::create([
            'folio' => 2500,
            'name'=> '1',
            'document_type'=> '1',
            'dependency' => 'SC',
            'department' => 'CG',
            'date' => Carbon::today()->subDay()->toDateString(),
            'number'=> 1,
            'sender'=>'1',
            'sender_position' => '1',
            'subject'=> '1',
            'assigned_area' => 1,
            'observations' => '1',
            'document'=>'1',
            'response_date' => Carbon::today()->subDay()->toDateString()
        ]);
    }
}
