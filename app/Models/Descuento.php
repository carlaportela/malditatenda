<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuentos';
    protected $primaryKey = 'idDescuento';
    

    protected $fillable = [
        'codigoDescuento', 'cantidadDescuento','fechaValidez'
    ];
}
