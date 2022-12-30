<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Moneda extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        "nombre",
        "abreviatura",
        "simbolo",
        "estado"

    ];
}
