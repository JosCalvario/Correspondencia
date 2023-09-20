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
            'name'=>'Dirección',
            'manager_id'=> 1,
            'phone' => '1234567890',
            'address'=>'Dirección 1',
            'unit_id'=>1,
            'abbr' =>'DA'
        ]);
        Area::create([
            'name'=>'Subdirección',
            'manager_id'=> 2,
            'phone' => '1234567891',
            'address'=>'Dirección 2',
            'unit_id'=>1,
            'abbr' =>'SUB'
        ]);
        Area::create([
            'name'=>'Recursos Materiales y Servicios Generales',
            'manager_id'=> null,
            'phone' => '1234567890',
            'address'=>'Dirección 1',
            'unit_id'=>1,
            'abbr' =>'RMySG'
        ]);
        Area::create([
            'name'=>'Recursos Humanos',
            'manager_id'=> null,
            'phone' => '1234567891',
            'address'=>'Dirección 2',
            'unit_id'=>1,
            'abbr' =>'RH'
        ]);
        Area::create([
            'name'=>'Planeación y Tecnologías de la Información',
            'manager_id'=> null,
            'phone' => '1234567890',
            'address'=>'Dirección 1',
            'unit_id'=>1,
            'abbr' =>'DGCP'
        ]);
        Area::create([
            'name'=>'Presupuesto y Contabilidad',
            'manager_id'=> null,
            'phone' => '1234567891',
            'address'=>'Dirección 2',
            'unit_id'=>1,
            'abbr' =>'PyC'
        ]);
        Area::create([
            'name'=>'Unis',
            'manager_id'=> null,
            'phone' => '1234567891',
            'address'=>'Dirección 2',
            'unit_id'=>1,
            'abbr' =>'UNIS'
        ]);
        Request::create([
            'folio' => 5000,
            'name'=> 'Memo-SC-CG-2023',
            'document_type'=> 'Memorándum',
            'dependency' => 'SC',
            'department' => 'CG',
            'date' => Carbon::parse('2023/08/28'),
            'number'=> 1,
            'sender'=>'Rodolfo Pulido',
            'sender_position' => 'Administrador',
            'subject'=> 'Documentar',
            'assigned_area' => 1,
            'observations' => 'os',
            'document'=>'asd'
        ]);

        Request::create([
            'folio' => 5002,
            'name'=> 'Oficio-SC-CG-2023',
            'document_type'=> 'Oficio',
            'dependency' => 'SC',
            'department' => 'CG',
            'date' => Carbon::parse('2023/09/7'),
            'number'=> 2,
            'sender'=>'Rodolfo Pulido',
            'sender_position' => 'Administrador',
            'subject'=> 'Documentar',
            'assigned_area' => 2,
            'observations' => 'os',
            'document'=>'assd'
        ]);
        Request::create([
            'folio' => 5003,
            'name'=> 'Oficio-SC-3-2023',
            'document_type'=> 'Oficio',
            'dependency' => 'SC',
            'department' => 'CG',
            'date' => Carbon::parse('2023/09/8'),
            'number'=> 3,
            'sender'=>'Rodolfo Pulido',
            'sender_position' => 'Administrador',
            'subject'=> 'Documentar',
            'assigned_area' => 1,
            'observations' => 'os',
            'document'=>'assd'
        ]);
    }
}
