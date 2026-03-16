<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'idPedido';
    public $timestamps = true;

    protected $fillable = [
        'idUsuario',
        'idCesta',
        'idPago',
        'idEnvio',
        'estadoPedido',
        'codigoDescuento',
        'idDevolucion'
    ];

    // Relación con usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'idUsuario','idUsuario');
    }
    // Relación con pago
    public function pago()
    {
        return $this->belongsTo(Pago::class, 'idPago', 'idPago');
    }

    //Relación con envío
    public function envio()
    {
        return $this->belongsTo(Envio::class, 'idEnvio', 'idEnvio');
    }

    public function pedidoProductos()
    {
        return $this->hasMany(PedidoProducto::class, 'idPedido', 'idPedido');
    }

    public function descuento()
    {
        return $this->belongsTo(Descuento::class, 'codigoDescuento', 'codigoDescuento');
    }

}
