<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\Cesta;
use App\Models\Pago;
use App\Models\Envio;
use App\Models\PedidoProducto;

class PedidoController extends Controller
{
    public function checkout()
    {
        $usuario = Auth::user();
        $cesta = $usuario->cesta()->with('producto')->get();

        $subtotal = $cesta->sum(function($item){
            return $item->producto->precio * $item->cantidad;
        });

        $envio = 3.95;
        $total = $subtotal + $envio;

        return view('pedido', compact('cesta', 'subtotal', 'envio', 'total'));
    }

    public function realizarPedido(Request $request)
    {
        $usuario = Auth::user();
        $cesta = Cesta::where('idUsuario', $usuario->idUsuario)->get();
        if($cesta->isEmpty()){
            return redirect()->route('cesta.index')->withErrors('Tu cesta está vacía.');
        }
        $subtotal = $cesta->sum(function($item){
            return $item->producto->precio * $item->cantidad;
        });
        $envio = 3.95;
        $total = $subtotal + $envio;
        // Crear envío
        $envio = Envio::create([
            'fechaEnvio' => now(),
            'fechaEntrega' => now()->addDays(3),
            'estadoEnvio' => 'Pendiente'
        ]);

        // Crear transacción fake
        $transaccion = 'SIMULADO-'.time();

        DB::table('transacciones')->insert([
            'idTransaccion' => $transaccion,
            'metodoPago' => 'Stripe',
            'autorizado' => 1
        ]);

        //Crear pago simulado
        $pago = Pago::create([
            'idTransaccion' => $transaccion,
            'cantidadPago' => $total,
            'realizadoPago' => 1,
        ]);

        // 3️⃣ Crear pedido
        $idCesta=$cesta->first()->idCesta; //Guardamos el idCesta en una variable para no perderlo cuando se borra la cesta
        $pedido = Pedido::create([
            'idUsuario' => $usuario->idUsuario,
            'idCesta' => $idCesta, 
            'idPago' => $pago->idPago,
            'idEnvio' => $envio->idEnvio,
            'estadoPedido' => 'pagado'
        ]);

        foreach($cesta as $item){

            PedidoProducto::create([
                'idPedido' => $pedido->idPedido,
                'idProducto' => $item->idProducto,
                'cantidad' => $item->cantidad,
                'precio' => $item->producto->precio
            ]);

        }
        //Vaciar la cesta
        Cesta::where('idUsuario', $usuario->idUsuario)->delete();

        //Redirigir a página de éxito
        return redirect()->route('pedido.exito')->with('success', 'Pedido realizado correctamente. ¡Gracias!');
    }

    public function exito()
    {
        return view('pedido.exito');
    }
}
