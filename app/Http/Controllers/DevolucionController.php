<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Devolucion;
use Illuminate\Support\Facades\Auth;

class DevolucionController extends Controller
{
   public function crear($idPedido)
    {
        $pedido = Pedido::with('pedidoProductos.producto')->findOrFail($idPedido);

        return view('devolucion', compact('pedido'));
    } 

    public function guardar(Request $request)
    {
        $request->validate([
            'productos' => 'required|array|min:1',
            'motivo' => 'required'
        ]);

        // 1️⃣ Crear devolución
        $devolucion = Devolucion::create([
            'idUsuario' => Auth::user()->idUsuario,
            'idPedido' => $request->idPedido,
            'razonDevolucion' => $request->motivo,
            'estadoDevolucion' => 'pendiente',
            'cantidadDevolucion' => $request->cantidadDevolucion
        ]);

        // 2️⃣ Asociar productos
        $devolucion->productos()->attach($request->productos);

        return redirect()->route('micuenta')->with('success','Solicitud de devolución enviada.');
    }

    public function cancelar($id)
    {
        $devolucion = Devolucion::findOrFail($id);

        if($devolucion->estadoDevolucion == 'pendiente'){
            $devolucion->estadoDevolucion = 'cancelada';
            $devolucion->save();
        }

        return redirect()->back();
    }
    
}
