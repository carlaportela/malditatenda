<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devoluciones';
    protected $primaryKey = 'idDevolucion';
    

    protected $fillable = [
        'idUsuario', 'idPedido', 'idProducto','idPagoDevolucion','razonDevolucion', 'fechaRecepcion','estadoDevolucion','cantidadDevolucion'
    ];

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class,'idProducto','idProducto');
    }
}
