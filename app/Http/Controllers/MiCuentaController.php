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


    public function actualizar(Request $request)
    {

        $usuario = Auth::user();

        $request->validate([
            'nombreUsuario' => 'required',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'cp' => 'nullable',
            'localidad' => 'nullable',
            'provincia' => 'nullable'
        ]);

        $usuario->update($request->all());

        return back()->with('success','Datos actualizados correctamente');
    }


    public function cambiarPassword(Request $request)
    {

        $usuario = Auth::user();

        $request->validate([
            'password_actual' => 'required',
            'password_nueva' => 'required|min:6|confirmed'
        ]);

        if(!Hash::check($request->password_actual, $usuario->contrasenha)){
            return back()->with('error','La contraseña actual no es correcta');
        }

        $usuario->update([
            'contrasenha' => Hash::make($request->password_nueva)
        ]);

        return back()->with('success','Contraseña actualizada');
    }

}