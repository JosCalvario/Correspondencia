<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    function response(){
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
}
