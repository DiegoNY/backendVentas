<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        "dni",
        "descripcion",
        "correo",
        "telefono",
        "direccion",
        "estado"

    ];
}
