<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    protected $table = 'usuarios';        // Nombre de la tabla
    protected $primaryKey = 'idUsuario';  // Clave primaria
    public $timestamps = true;            // created_at y updated_at

    protected $fillable = [
        'nombreUsuario',
        'apellidos',
        'telefono',
        'direccion',
        'cp',
        'localidad',
        'provincia',
        'correo',
        'contrasenha',
        'autorizado',
    ];

    // Hash automático de la contraseña
    public function setContrasenhaAttribute($value)
    {
        $this->attributes['contrasenha'] = Hash::make($value);
    }
}
