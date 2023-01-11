<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [

        "nombre",
        "serie",
        "descripcion_caja",
        "ip_mask",
        "estado",
        "estatus",

    ];
}
