<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    /**
     * Mostrar la página de contacto
     */
    public function index()
    {
        return view('contacto');
    }

    /**
     * Guardar mensaje en base de datos
     */
    public function store(Request $request)
    {
        // Validación segura
        $request->validate([
        'textoMensaje' => 'required|string',
        'nombreMensaje' => 'required|string|max:255',
        'correomensaje' => 'required|email|max:255',
        'idUsuario' => 'nullable|exists:usuarios,idUsuario'
        ]);

        // Guardar mensaje
        $mensaje = new Mensaje();
        $mensaje->nombreMensaje = $request->nombreMensaje;
        $mensaje->correoMensaje = $request->correomensaje;
        $mensaje->textoMensaje = $request->textoMensaje;
        $mensaje->idUsuario = $request->idUsuario; // null si no está logueado
        $mensaje->save();

        return redirect()
            ->route('contacto')
            ->with('success', 'Tu mensaje ha sido enviado correctamente.
                    <br>Recibirás una respuesta lo antes posible.
                    <br>¡Gracias por tu interés!');
    }
}

