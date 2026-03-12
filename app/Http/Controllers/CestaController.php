<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cesta;
use Illuminate\Support\Facades\Auth;

class CestaController extends Controller
{   
    public function add(Request $request)
    {
        // Para depuración
        // dd($request->all(), Auth::check(), Auth::user());

        // Validamos el producto recibido
        $request->validate([
            'idProducto' => 'required|integer|exists:productos,idProducto'
        ]);

        $usuario = Auth::user();

        // Buscar si el producto ya está en la cesta
        $item = Cesta::where('idUsuario', $usuario->idUsuario)
            ->where('idProducto', $request->idProducto)
            ->first();

        if ($item) {
            // Incrementar cantidad
            $item->cantidad += 1;
            $item->save();
        } else {
            // Crear nuevo registro
            Cesta::create([
                'idProducto' => $request->idProducto,
                'idUsuario' => $usuario->idUsuario,
                'cantidad' => 1
            ]);
        }

        // Devolver contador actualizado
        $contador = Cesta::where('idUsuario', $usuario->idUsuario)->sum('cantidad');

        return response()->json([
            'success' => true,
            'contador' => $contador
        ]);
    }
}

