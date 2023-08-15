<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use App\Models\Area;
use App\Models\Unit;
use App\Models\DocumentType;
use Carbon\Carbon;
use File;
class RequestController extends Controller
{

    protected $storage="storage/requests/";
    protected $variableS="request";
    protected $variableP="requests";
    protected $viewRoutes=[
        'index'   =>  'web.requests.index'
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
        'document'
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
        $data=Request::paginate(12);
        $areas = Area::all();
        return view($this->viewRoutes['index'])->with(
            [
                $this->variableP=>$data,
                'areas' => $areas,
                'folio' => Request::getFolioForRequest()
            ]
        );
    }

    public function store(StoreRequestRequest $request)
    {
        $data = $request->all();
        $area = Area::find($data['assigned_area']);
        // $unit = Unit::find($area->unit_id);
        $unit = $area->unit;
        $year = Carbon::parse($data['date'])->format('Y');
        foreach($this->files as $file){
            $newFile=$request->file($file);
            $extension=$newFile->getClientOriginalExtension();
            $fileName=$file.date('YmdHis').'.'.$extension;
            $newFile->move($this->storage, $fileName);
            $data[$file]=$fileName;
        }
        $data['name'] = $unit->abbr.'-'.$area->abbr.'-'.$data['number'].'-'.$year;

        Request::create($data);
        return redirect()->action([RequestController::class,'index']);
    }

    public function update(UpdateRequestRequest $request, $id)
    {
        $input=$request->all();
        $data=Request::find($id);
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

        return redirect()->action([RequestController::class,'index']);
    }

    public function destroy($id)
    {
        $data=Request::find($id);
        foreach($this->files as $file){
            $delete=$this->storage.$data->{$file};
            File::delete($delete);
        }

        $data->delete();

        return redirect()->to(action([RequestController::class,'index']));
    }
}
