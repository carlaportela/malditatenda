<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\Cesta;

class PedidoController extends Controller
{
    public function checkout()
    {
        $usuario = Auth::user();

        // obtener cesta del usuario, evita null
        $cesta = $usuario->cesta()->with('producto')->get(); // retorna Collection

        $subtotal = $cesta->sum(function($item){
            return $item->producto->precio * $item->cantidad;
        });

        $envio = 3.95;

        return view('pedido', compact('cesta', 'subtotal', 'envio'));
    }
}
