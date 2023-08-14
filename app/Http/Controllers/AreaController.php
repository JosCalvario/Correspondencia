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

    public function __construct()
    {
        //Ponemos el permiso y luego el método que protege
        foreach($this->permissions as $per){
            $this->middleware('can:'.$this->variableP.'.'.$per)->only($per);
        }
    }
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

    public function store(StoreAreaRequest $request)
    {
        $data = $request->all();

        foreach($this->files as $file){
            $newFile=$request->file($file);
            $extension=$newFile->getClientOriginalExtension();
            $fileName=$file.date('YmdHis').'.'.$extension;
            $newFile->move($this->storage, $fileName);
            $data[$file]=$fileName;
        }

        $area = Area::create($data);
        $user = User::find($data['manager_id']);
        $user->area_id = $area->id;
        $user->update();
        
        return redirect()->action([AreaController::class,'index']);
    }

    public function update(UpdateAreaRequest $request, $id)
    {
        $input=$request->all();
        $data=Area::find($id);
        foreach($this->files as $file){
            if($request->hasFile($file)){
                $oldFile=$this->storage.$data->{$file};
                File::delete(public_path($oldFile));

                $newFile=$request->file($file);
                $extension=$newFile->getClientOriginalExtension();
                //Nombre de imagen en base de datos 
                $fileName=$file.date('YmdHis').'.'.$extension;

                $newFile->move($this->storage, $fileName);
                $data[$file]=$fileName;
            }
            else{
                unset($input[$file]);
            }
        }
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
