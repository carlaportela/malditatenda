<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';
    protected $primaryKey = 'idTransaccion';

    public $timestamps = false;

    protected $fillable = [
        'metodoPago',
        'fechaTransaccion',
        'autorizado',
    ];
}
