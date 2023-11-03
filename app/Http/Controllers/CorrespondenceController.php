<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Search;
use App\Http\Requests\CreateFolioRequest;
use App\Models\Response;
use App\Models\Request;

class CorrespondenceController extends Controller
{
    use Search;

    
    function index(){
        $this->model = Request::class;
        $today = \Carbon\Carbon::today();

        $query = $this->query();
        $requests = $this->get($query,'>');
        $countPending = 0;
        $countDate = 0;

        foreach ($requests as $key => $request) {
            if(count($request->responses)==0 && $request->knowledge != 1)
            {
                $countPending ++;
            }

            if($request->urgent == 1 || $request->response_date >= $today)
            {
                $countDate ++;
            }
        }

        return view('web.index', compact('countPending', 'countDate'));
    }
}
