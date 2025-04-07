<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motos extends Model
{
    protected $fillable  = [
        "nombre", "fecha", "pais_id", "precio", "activo"
    ];
    public function pais(){
        return $this->belongsTo(\App\Models\Paises::class, 'pais_id');
    }
}
