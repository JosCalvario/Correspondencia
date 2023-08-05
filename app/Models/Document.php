<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'name',
        'document_type_id',
        'date',
        'number',
        'sender',
        'subject',
        'assigned_area',
        'observations'
    ];

    function document_type(){
        return $this->belongsTo(DocumentType::class);
    }

    function area(){
        return $this->belongsTo(Area::class);
    }
}
