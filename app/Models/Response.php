<?php

namespace App\Models;

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
        'cargo', //Manual
        'subject', //Manual
        'solicitante', //Persona que pide el folio
        'area_id', 
        'document_type_id',
        'status', //Editable
        'cancelation', //Si se cancela se tiene que llenar
        'document',
        'request_id'
    ];

    function application(){
        return $this->hasOne(Request::class);
    }

    function area(){
        return $this->belongsTo(Area::class);
    }

    function document_type(){
        return $this->belongsTo(DocumentType::class);
    }
}
