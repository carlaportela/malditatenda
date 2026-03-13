<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cesta;
use Illuminate\Support\Facades\Auth;

class CestaController extends Controller
{   
    //Añadir productos a la cesta
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
            // Esto no permita que se añada dos veces el mismo producto a la cesta
             return back()->with('error', 'Este producto ya está en tu cesta');
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

    //Mostrar, eliminar productos y vaciar cesta
    public function index()
    {
        $items = Cesta::where('idUsuario', Auth::user()->idUsuario)
            ->with('producto')
            ->get();

        return view('canastro', compact('items'));
    }

    public function destroy($id)
    {
        $item = Cesta::findOrFail($id);
        $item->delete();

        return back()->with('success','Producto eliminado de la cesta');
    }

    public function vaciar()
    {
        Cesta::where('idUsuario', Auth::user()->idUsuario)->delete();

        return back()->with('success','Cesta vaciada');
    }
    
    //Mostrar el número de artículos en la cesta
    public function contador()
    {
        if(!Auth::check()){
            return response()->json(['contador' => 0]);
        }

        $contador = Cesta::where('idUsuario', Auth::user()->idUsuario)
            ->sum('cantidad');

        return response()->json(['contador' => $contador]);
    }
}
