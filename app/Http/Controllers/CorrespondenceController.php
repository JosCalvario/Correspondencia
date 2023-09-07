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
}
