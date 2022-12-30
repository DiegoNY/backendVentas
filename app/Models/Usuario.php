<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    protected $connection = 'mongodb';

    protected $fillable = [
        "dni",
        "nombre",
        "email",
        "telefono",
        "fecha_ingreso",
        "cargo",
        "tipo",
        "usuario",
        "clave"
    ];
}
