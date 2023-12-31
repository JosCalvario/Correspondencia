<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $fillable = [
        'name',
        'manager_id',
        'phone',
        'address',
        'unit_id',
        'abbr'
    ];

    function manager() {
        return $this->hasOne(User::class,'id','manager_id');
    }

    function users(){
        return $this->hasMany(User::class);
    }

    function unit(){
        return $this->belongsTo(Unit::class);
    }
}
