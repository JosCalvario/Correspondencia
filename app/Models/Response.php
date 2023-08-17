<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio',
        'email',
        'date',  //Manual
        'recieves', //Manual
        'position', //Manual
        'subject', //Manual
        'applicant_id', //Persona que pide el folio
        'area_id', 
        'document_type',
        'status', //Editable
        'cancelation', //Si se cancela se tiene que llenar
        'document',
        'request_id'
    ];

    function request(){
        return $this->belongsTo(Request::class);
    }

    function area(){
        return $this->belongsTo(Area::class);
    }

    function document_type(){
        return $this->belongsTo(DocumentType::class);
    }

    function applicant(){
        return $this->belongsTo(User::class,'applicant_id','id');
    }

    static function getFolioForResponse(){
        $thisYear = Carbon::today()->toDateString();
        $response = Response::whereDate('created_at',$thisYear)->get()->last();
        if($response == null){
            return 1;
        }
        $folio = $response->folio + 1;
        return $folio;
    }
}
