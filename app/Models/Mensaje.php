<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'nombreMensaje',
        'correomensaje',
        'textoMensaje'
    ];
     public $timestamps = false; // 🔹 desactiva created_at y updated_at
}
