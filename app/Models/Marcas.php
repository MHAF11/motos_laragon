<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $fillable = [
        "nombre", "fecha", "activo"
    ];
}
