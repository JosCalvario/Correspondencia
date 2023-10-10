<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Unit;
use File;

class AreaController extends Controller
{
    protected $storage="storage/areas/";
    protected $variableS="area";
    protected $variableP="areas";
    protected $viewRoutes=[
        'index'   =>  'web.areas.index'
    ];
    protected $permissions=[
        'index',
        'create',
        'store',
        'edit',
        'update',
        'show',
        'destroy'

    ];
    protected $files=[

    ];

    public function index()
    {
        $data=Area::paginate(12);
        $users = User::whereNull('area_id')->get();
        $units = Unit::all();
        return view($this->viewRoutes['index'])->with(
            [
                $this->variableP=>$data,
                'users' => $users,
                'units'=> $units
            ]
        );
    }

    function show($id)
    {
        $area = Area::find($id);
        $units = Unit::all();
        $users = User::all();
        return view('web.areas.show',['area' => $area, 'units' => $units, 'users' => $users]);
    }


    public function store(StoreAreaRequest $request)
    {
        $data = $request->all();

        $area = Area::create($data);
        $user = User::find($data['manager_id']);
        $user->area_id = $area->id;
        $user->update();
        
        return redirect()->action([AreaController::class,'index']);
    }

    public function update(UpdateAreaRequest $request,$id)
    {
        $input=$request->all();
        $data=Area::find($id);
        
        $data->update($input);

        return redirect()->action([AreaController::class,'index']);
    }

    public function destroy($id)
    {
        $data=Area::find($id);
        foreach($this->files as $file){
            $delete=$this->storage.$data->{$file};
            File::delete($delete);
        }

        $data->delete();

        return redirect()->to(action([AreaController::class,'index']));
    }
}
