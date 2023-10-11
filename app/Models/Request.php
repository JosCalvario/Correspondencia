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
        'knowledge'
    ];


    function area(){
        return $this->belongsTo(Area::class,'assigned_area');
    }

    function responses(){
        return $this->belongsToMany(Response::class)->withPivot('canceled');
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
            $canceled =  Request::whereRelation('responses', 'canceled', true)->get();
            $requests = Request::doesntHave('responses')->get();
            return $canceled->merge($requests);
        }
        $canceled =  Request::whereRelation('responses', 'canceled', true)->where('assigned_area','=',$area)->get();
        $requests = Request::doesntHave('responses')->where('assigned_area','=',$area)->get();
        return $canceled->merge($requests);
        
    }

    static function findWithoutResponseOrFolio($id){
        $area = auth()->user()->area?->id ?? 0;

        if($area == 1)
        {
        $canceled =  Request::whereRelation('responses', 'canceled', true)->where('name','like', '%' . $id . '%')->get();
        $requests = Request::doesntHave('responses')->where('name','like', '%' . $id . '%')->get();
        return $canceled->merge($requests);  
        }
        $canceled =  Request::whereRelation('responses', 'canceled', true)->where('assigned_area','=',$area)->where('name','like', '%' . $id . '%')->get();
        $requests = Request::doesntHave('responses')->where('assigned_area','=',$area)->where('name','like', '%' . $id . '%')->get();
        return $canceled->merge($requests);        
    }
}
