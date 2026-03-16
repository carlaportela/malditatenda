<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'idPago';

    public $timestamps = true;

    protected $fillable = [
        'idTransaccion',
        'cantidadPago',
        'fechaPago',
        'realizadoPago',
    ];
}
