<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    // Mostrar formulario de login
    public function index()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
    {

        // Validación
        $request->validate([
            'correo' => 'required|email',
            'contrasenha' => 'required'
        ]);

        // Buscar usuario por correo
        $usuario = Usuario::where('correo', $request->correo)->first();

        // Verificar contraseña
        if ($usuario && Hash::check($request->contrasenha, $usuario->contrasenha)) {

            // Guardar usuario en sesión
            session([
                'usuario_id' => $usuario->idUsuario,
                'usuario_nombre' => $usuario->nombreUsuario
            ]);

            return redirect('/')
                ->with('success', 'Bienvenido ' . $usuario->nombreUsuario);
        }

        // Si falla
        return back()->withErrors([
            'login' => 'Correo electrónico o contraseña incorrectos'
        ]);
    }

    // Logout
    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}
