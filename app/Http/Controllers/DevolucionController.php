<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Devolucion;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class DevolucionController extends Controller
{
   //Método para crear una devolución en el formulario de devolución
    public function crear($idPedido)
    {
        $pedido = Pedido::with('pedidoProductos.producto')->findOrFail($idPedido);
        // Filtrar productos NO devolubles
        foreach ($pedido->pedidoProductos as $item) {

            $producto = $item->producto;

            $yaDevuelto = $producto->devoluciones()
                ->whereIn('estadoDevolucion', ['pendiente', 'aprobada'])
                ->where('idPedido', $pedido->idPedido)
                ->exists();

            $item->noDevolvible = $yaDevuelto;

        return view('devolucion', compact('pedido'));
        } 
    }

    //Método para crear una devolución
    public function guardar(Request $request)
    {
        $request->validate([
            'productos' => 'required|array|min:1',
            'motivo' => 'required'
        ]);

        //Comprobar que los productos solicitados no tiene devolucion pendiente o aprobada
        foreach($request->productos as $productoId){

            $existe = Devolucion::whereHas('productos', function($q) use ($productoId){
                $q->where('productos.idProducto', $productoId);
            })
            ->where('idPedido', $request->idPedido)
            ->whereIn('estadoDevolucion', ['pendiente','aprobada'])
            ->exists();

            if($existe){
                return back()->with('error','Uno de los productos ya tiene devolución.');
            }
        }

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

    //Método para cancelar una devolución
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
