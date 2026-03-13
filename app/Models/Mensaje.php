<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';
    protected $primaryKey = 'idMensaje';
    public $timestamps = true;

    protected $fillable = [
        'idUsuario','nombreMensaje','correoMensaje','textoMensaje','respondido'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'idUsuario','idUsuario');
    }
}
