<?php

namespace App\Models;

use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;
use Illuminate\Support\Facades\DB;

class Request extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'folio',
        'name',
        'document_type',
        'dependency',
        'department',
        'date',
        'number',
        'sender',
        'sender_position',
        'theme',
        'subject',
        'assigned_area',
        'observations',
        'document',
        'knowledge',
        'closing',
        'response_date'
    ];


    function area(){
        return $this->belongsTo(Area::class,'assigned_area');
    }

    function responses(){
        return $this->belongsToMany(Response::class);
    }

    static function getFolioForRequest(){
        $thisYear = Carbon::today()->toDateString();
        $request = Request::whereDate('created_at',$thisYear)->get()->last();
        if($request == null){
            return 1;
        }
        $folio = $request->folio + 1;
        return $folio;
    }

    static function getAllWithoutResponseOrFolio(){
        $area = auth()->user()->area?->id ?? 0;

        if($area == 1)
        {
            return Request::doesntHave('responses')->where('knowledge',0)->get();
        }
        return Request::doesntHave('responses')->where('assigned_area','=',$area)->where('knowledge',0)->get();
        
    }

    static function findWithoutResponseOrFolio($id){
        $area = auth()->user()->area?->id ?? 0;

        if($area == 1)
        {
        return Request::doesntHave('responses')->where('name','like', '%' . $id . '%')->where('knowledge',0)->get();
        }
        return Request::doesntHave('responses')->where('assigned_area','=',$area)->where('name','like', '%' . $id . '%')->where('knowledge',0)->get();
    }

    public static function getClosing()
    {
        $date = Carbon::today()->toDateString();
        $data = Request::where('closing',0)->get();
        
        return $data;
    }

    public static function checkClosing()
    {

        $data = Request::getClosing();
        foreach ($data as $key){
            $key->closing = 1;
            $key->save();
        }

    }
}
