<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Response;
use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;

class ResponseController extends Controller
{

    public function index()
    {
        $data = Response::orderByRaw("Field(status, 'Vigente','Contestado','Cancelado')")->get();

        return view('web.responses.index',[
            'responses' => $data
        ]);
    }



    public function store(StoreResponseRequest $request)
    {
        $data = $request->all();
        $response = Response::find($data['id']);
    }


    public function update(UpdateResponseRequest $request, Response $response)
    {
        //
    }
    
    public function destroy(Response $response)
    {
        //
    }
}
