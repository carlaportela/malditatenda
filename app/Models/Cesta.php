<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cesta extends Model
{
    protected $table = 'cestas';

    protected $primaryKey = 'idCesta';
    public $timestamps = true;
    protected $fillable = [
        'idProducto',
        'idUsuario',
        'cantidad'
    ];
 
}
