<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;

class ResponseController extends Controller
{

    public function index()
    {
        $data = Response::all();
        return view('web.responses.index',[
            'responses' => $data
        ]);
    }



    public function store(StoreResponseRequest $request)
    {
        //
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
