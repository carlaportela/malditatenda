<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'idProducto';
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

    public function devoluciones()
    {
        return $this->belongsToMany(
            Devolucion::class,
            'devolucion_productos',
            'idProducto',
            'idDevolucion'
        );
    }
}
