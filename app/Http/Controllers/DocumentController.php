<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Area;
use App\Models\Unit;
use App\Models\DocumentType;
use Carbon\Carbon;
use File;
//TODO: Separar documentos de solicitud y documentos de respuesta
class DocumentController extends Controller
{

    protected $storage="storage/documents/";
    protected $variableS="document";
    protected $variableP="documents";
    protected $viewRoutes=[
        'index'   =>  'web.documents.index'
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
        $data=Document::paginate(12);
        $types = DocumentType::all();
        $areas = Area::all();
        return view($this->viewRoutes['index'])->with(
            [
                $this->variableP=>$data,
                'types' => $types,
                'areas' => $areas
            ]
        );
    }

    public function store(StoreDocumentRequest $request)
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

        Document::create($data);
        return redirect()->action([DocumentController::class,'index']);
    }

    public function update(UpdateDocumentRequest $request, $id)
    {
        $input=$request->all();
        $data=Document::find($id);
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

        return redirect()->action([DocumentController::class,'index']);
    }

    public function destroy($id)
    {
        $data=Document::find($id);
        foreach($this->files as $file){
            $delete=$this->storage.$data->{$file};
            File::delete($delete);
        }

        $data->delete();

        return redirect()->to(action([DocumentController::class,'index']));
    }
}
