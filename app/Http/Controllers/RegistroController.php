<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class RegistroController extends Controller
{
    // Mostrar el formulario
    public function index()
    {
        return view('registro');
    }

    // Guardar usuario
    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'nombreUsuario' => 'required|string|max:30',
            'apellidos' => 'required|string|max:50',
            'telefono' => 'nullable|numeric',
            'direccion' => 'nullable|string|max:50',
            'cp' => 'nullable|numeric',
            'localidad' => 'nullable|string|max:30',
            'provincia' => 'nullable|string|max:30',
            'correo' => 'required|email|unique:usuarios,correo',
            'contrasenha' => 'required|string|min:6|confirmed', // requiere campo contrasenha_confirmation
        ]);

        // Crear usuario
        Usuario::create($validated);

        // Redirigir al login con mensaje de éxito
        return redirect()->route('registro')
                         ->with('success', '¡Registro completado correctamente!.
                         <br>Ahora puedes iniciar sesión');
    }
}
