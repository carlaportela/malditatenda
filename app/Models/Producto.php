<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'idProducto',
        'nombreProducto',
        'descripcion',
        'idCategoria',
        'cantidad',
        'stockProducto',
        'medidas',
        'materiales',
        'colores',
        'precio',
        'imagen',
        'destacado'
    ];
}
