<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'idPedido';
    public $timestamps = false; // tu tabla no tiene created_at/updated_at

    protected $fillable = [
        'idUsuario','idCesta','idPago','idEnvio','codigoDescuento','idDevolucion','cantidadPedido'
    ];

    // Relación con usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'idUsuario','idUsuario');
    }
}
