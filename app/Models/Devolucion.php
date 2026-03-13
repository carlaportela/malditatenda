<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devoluciones';
    protected $primaryKey = 'idDevolucion';
    public $timestamps = false;

    protected $fillable = [
        'idProducto','idPagoDevolucion','razonDevolucion','fechaDevolucion','fechaRecepcion','estadoDevolucion','cantidadDevolucion'
    ];

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class,'idProducto','idProducto');
    }
}
