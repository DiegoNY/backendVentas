<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        "ruc",
        "nombre",
        "abreviatura",
        "telefono",
        "direccion",
        "correo",
        "estado"
    ];
}
