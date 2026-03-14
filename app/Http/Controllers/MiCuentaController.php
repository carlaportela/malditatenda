<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pedido;
use App\Models\Devolucion;
use App\Models\Mensaje;

class MiCuentaController extends Controller
{

    public function index()
    {
        $usuario = Auth::user();

         // Traer historial de pedidos, devoluciones y mensajes del usuario logeado
    $pedidos = Pedido::where('idUsuario', $usuario->idUsuario)->get();
    $devoluciones = Devolucion::where('idUsuario', $usuario->idUsuario)->get();
    $mensajes = Mensaje::where('idUsuario', $usuario->idUsuario)->get();

    return view('micuenta', compact('usuario', 'pedidos', 'devoluciones', 'mensajes'));
    }

    // Mostrar formulario editar datos
    public function editar()
    {
        $usuario = Auth::user();

        return view('micuenta.editar', compact('usuario'));
    }

    // Guardar datos
    public function guardarDatos(Request $request)
    {
        $usuario = Auth::user();

        $request->validate([
            'nombreUsuario' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'cp' => 'nullable|string|max:10',
            'localidad' => 'nullable|string|max:255',
            'provincia' => 'nullable|string|max:255',
        ]);

        $usuario->update($request->only([
            'nombreUsuario',
            'apellidos',
            'telefono',
            'direccion',
            'cp',
            'localidad',
            'provincia'
        ]));

        return redirect()->route('micuenta')->with('success','Datos actualizados correctamente');
    }

    // Mostrar formulario cambiar contraseña
    public function password()
    {
        return view('micuenta.password');
    }

    // Guardar nueva contraseña
    public function guardarPassword(Request $request)
    {

        $request->validate([
            'password_actual' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $usuario = Auth::user();

        if(!Hash::check($request->password_actual, $usuario->contrasenha)){
            return back()->withErrors([
                'password_actual' => 'La contraseña actual no es correcta'
            ]);
        }

        $usuario->contrasenha = $request->password;
        $usuario->save();

        // 🔹 refrescar usuario autenticado
        Auth::setUser($usuario->fresh());

        return redirect()
        ->route('micuenta.password')
        ->with('success', 'Contraseña cambiada correctamente');
    }
}