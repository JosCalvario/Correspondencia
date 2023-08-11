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
        DocumentType::create([
            'name' => 'Documento'
        ]);
        Area::create([
            'name'=>'Area 1',
            'manager_id'=> 1,
            'phone' => '1234567890',
            'address'=>'aqui',
            'unit_id'=>1,
            'abbr' =>'DGCP'
        ]);
        Request::create([
            'name'=> 'name',
            'document_type_id'=> 1,
            'date' => Carbon::now(),
            'number'=> 1,
            'sender'=>'Yo mero',
            'subject'=> 'Documentar',
            'assigned_area' => 1,
            'observations' => 'os',
            'document'=>'asd'
        ]);
    }
}
