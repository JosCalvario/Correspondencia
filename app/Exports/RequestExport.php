<?php

namespace App\Exports;

use App\Models\Area;
use App\Models\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RequestExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('reports.requests',[
            'data' => Request::getRequestReport(),
            'areas' => Area::all()
        ]);
    }
}
