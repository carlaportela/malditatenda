<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    protected $table = 'envios';
    protected $primaryKey = 'idEnvio';

    public $timestamps = false;

    protected $fillable = [
        'fechaEnvio',
        'fechaEntrega',
        'estadoEnvio',
    ];
}