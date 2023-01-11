<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        "descripcion",
        "id_laboratorio",
        "laboratorio",
        "tipo",
        "stock",
        "stock_minimo",
        "precio_compra",
        "precio_venta",
        "descuento",
        "venta_sujeta",
        "foto_producto",
        "estado",
        "fecha_registro",
        "codigo_barras",
        "estatus",
        "descuento"
    ];
}
