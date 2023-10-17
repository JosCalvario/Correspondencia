<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckClosingRequest;
use App\Models\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        return view('web.reports.index');
    }
    public function closing()
    {
        $data = Request::getClosing();
        $pdf = Pdf::loadView('reports.cut', compact($data));
        return $pdf->stream();
    }

    public function checkClosing(CheckClosingRequest $request)
    {
        
    }
}
