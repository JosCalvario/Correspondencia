<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckClosingRequest;
use App\Models\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Area;

class ReportController extends Controller
{
    public function index()
    {
        return view('web.reports.index');
    }
    public function closing()
    {
        $data = Request::getClosing();
        $pdf = Pdf::loadView('reports.closing',['data' => $data]);
        return $pdf->stream();
    }

    public function checkClosing()
    {
        Request::checkClosing();

        return redirect()->back()->with('success', 'Se ha realizado el corte');
    }

    public function requests()
    {
        $data = [];

        $areas = Area::all();
        foreach($areas as $area)
        {
            $data[$area->name]['Atendidos'] = count(Request::whereHas('responses',function(Builder $query){
                $query->where('document','!=',null);
            })
            ->where('assigned_area',$area->id)
            ->get());

            $data[$area->name]['Conocimiento'] = count(Request::where('knowledge',1)->where('assigned_area',$area->id)->get());

            $data[$area->name]['Sin Respuesta'] = count(Request::whereDoesntHave('responses')->where('assigned_area',$area->id)->where('knowledge',0)->get()) + 
            count(Request::whereHas('responses',function(Builder $query){
                $query->where('document','');
            })
            ->where('assigned_area',$area->id)
            ->get());;

            $data[$area->name]['Total'] = count(Request::where('assigned_area',$area->id)->get());
        }
        return view('web.reports.requests',['data'=>$data,'areas' => $areas]);
    }
}
