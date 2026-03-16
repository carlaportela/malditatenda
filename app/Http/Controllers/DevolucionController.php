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
        $productos = $request->productos;

        foreach($productos as $producto){

            Devolucion::create([
                'idPedido' => $request->idPedido,
                'idUsuario' => Auth::user()->idUsuario,
                'idProducto' => $producto,
                'razonDevolucion' => $request->motivo,
                'estadoDevolucion' => 'pendiente',
                'cantidadDevolucion' => $request->cantidadDevolucion
            ]);
        }
        return redirect()->route('micuenta')->with('success','Tramitada devolución.');
    }
}
