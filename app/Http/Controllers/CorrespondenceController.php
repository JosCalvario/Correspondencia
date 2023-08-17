<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolioRequest;
use App\Models\Response;
use App\Models\Request;

class CorrespondenceController extends Controller
{

    function index(){
        return view('web.index');
    }
    function createFolio(){
        $requests = Request::getAllWithoutResponseOrFolio();

        return view('web.responses.createFolio',[
            'requests' => $requests
        ]);
    }

    function storeFolio(CreateFolioRequest $request){
        $data = $request->all();
        $folio = Response::getFolioForResponse();
        $data['folio'] = $folio;
        $data['status'] = 'Vigente';
        Response::create($data);
        return redirect()->action([CorrespondenceController::class,'createFolio'])->with(['folio' => 'Tu número de folio es: '.$folio]);
    }
}
