<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Models\Response;
use Illuminate\Http\Request;

class CorrespondenceController extends Controller
{

    function index(){
        return view('web.index');
    }
    function createFolio(){
        return view('web.createInvoice');
    }

    function storeFolio(CreateInvoiceRequest $request){
        $data = $request->all();

        Response::create($data);
        return redirect()->action([CorrespondenceController::class,'index']);
    }
}
