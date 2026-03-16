<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    protected $table = 'pedido_productos';
    protected $primaryKey = 'idPedidoProducto';

    protected $fillable = [
        'idPedido',
        'idProducto',
        'cantidad',
        'precio'
    ];

    public $timestamps = false;
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto', 'idProducto');
    }
}
