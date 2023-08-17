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
        'document'
    ];


    function area(){
        return $this->belongsTo(Area::class,'assigned_area');
    }

    function responses(){
        return $this->belongsTo(Response::class,'document_id');
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
        $responses = Response::all('id');
        $requests = DB::table('requests')->where('assigned_area','=',auth()->user()->area->id)->whereNotIn('id',$responses)->get();
        return $requests;
    }
}
