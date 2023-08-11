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
        'recipt', //Manual
        'cargo', //Manual
        'subject', //Manual
        'solicitante', //Persona que pide el folio
        'area', 
        'document_type_id',
        'status', //Editable
        'cancelation', //Si se cancela se tiene que llenar
        'document',
        'document_id'
    ];

    function application(){
        return $this->hasOne(Request::class);
    }

}
