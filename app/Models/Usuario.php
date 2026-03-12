<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';

    public $timestamps = true;

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

    protected $hidden = [
        'contrasenha',
    ];

    /**
     * Laravel espera password
     */
    public function getAuthPassword()
    {
        return $this->contrasenha;
    }

    /**
     * Laravel espera email como identificador
     */
    public function getAuthIdentifierName()
    {
        return 'correo';
    }

    /**
     * Hash automático de la contraseña
     */
    public function setContrasenhaAttribute($value)
    {
        $this->attributes['contrasenha'] = Hash::make($value);
    }
}