<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;

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
        $validated = $request->validate([
            'nombreMensaje' => 'required|string|max:50',
            'correomensaje' => 'required|email|max:100',
            'textoMensaje' => 'required|string|max:2000',
        ]);

        // Guardar mensaje
        Mensaje::create($validated);

        return redirect()
            ->route('contacto')
            ->with('success', 'Tu mensaje ha sido enviado correctamente.
                    <br>Recibirás una respuesta lo antes posible.
                    <br>¡Gracias por tu interés!');
    }
}

