<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelFolioRequest;
use App\Http\Requests\CreateFolioRequest;
use App\Models\Request;
use App\Models\Response;
use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;

class ResponseController extends Controller
{

    public function index()
    {
        return view('web.responses.index');
    }

    public function edit($id)
    {
        $data = Response::find($id);
        return view('web.responses.edit',[
            'response' => $data
        ]);
    }

    public function show($id)
    {
        $data = Response::find($id);
        
        return view('web.responses.show',[
            'response' => $data
        ]);
    }

    public function createFolioRequisition()
    {
        return view('web.responses.createFolio');
    }

    public function storeFolioRequisition(CreateFolioRequest $request)
    {
        $data = $request->all();
        $folio = Response::getFolioForResponse($data['document_type']);
        $data['folio'] = $folio;
        $data['status'] = 'Vigente';
        
        $response = Response::create($data);
        if (isset($data['requests'])) {
            $response->requests()->sync($data['requests']);
        }
        
        return redirect()->action([ResponseController::class,'createFolioRequisition'])->with(['success' => 'Tu número de folio es: '.$folio]);
    }

    public function storeResponse(StoreResponseRequest $request,$id)
    {
        $data = $request->all();
        $response = Response::find($id);

        $data['status'] = 'Atendido';

        $file = 'document';
        $newFile=$request->file($file);
        $extension=$newFile->getClientOriginalExtension();
        $fileName=$file.date('YmdHis').'.'.$extension;
        $storage = "storage/responses/";
        $newFile->move($storage, $fileName);
        $data[$file]=$fileName;

        $data['cancelation'] = null;
        $response->update($data);

        return redirect()->action([ResponseController::class,'index'])->with(['success' => 'Se ha subido el documento']);
    }

    function cancelFolio(CancelFolioRequest $request, $id)
    {
        $data = $request->all();
        $response = Response::find($id);

        $data['status'] = 'Cancelado';

        $response->requests()->sync([]);
        
        $response->update($data);

        return redirect()->action([ResponseController::class,'index'])->with(['success' => 'Se ha cancelado el documento']);
    }

}
