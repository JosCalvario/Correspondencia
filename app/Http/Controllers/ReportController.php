<?php

namespace App\Http\Controllers;

use App\Exports\RequestExport;
use App\Http\Requests\CheckClosingRequest;
use App\Models\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportRequests()
    {
        $date = Carbon::today()->format('d-m-Y');
        return Excel::download(new RequestExport, 'soliciudes'.$date.'.xlsx');
    }
}
