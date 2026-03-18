<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\Cesta;

class ProductoController extends Controller
{

    //Función para mostrar los productos en la página de inicio
    public function index()
    {
        $productos = Producto::where('destacado', 1)
                            ->where('stockProducto', 1)
                            ->get();

        return view('index', compact('productos'));
    }

    //Función para mostrar los productos de cerámica
    public function ceramica()
    {
        $productos = Producto::where('idCategoria', 2)
                            ->where('stockProducto', 1)
                            ->get();


        return view('ceramica', compact('productos'));
    }

    //Función para mostrar los productos de bordados
    public function bordados()
    {
        $productos = Producto::where('idCategoria', 3)
                            ->where('stockProducto', 1)
                            ->get();

        return view('bordados', compact('productos'));
    }

    //Función para mostrar los productos de ilustracion
    public function ilustracion()
    {
        $productos = Producto::where('idCategoria', 4)
                            ->where('stockProducto', 1)
                            ->get();

        return view('ilustracion', compact('productos'));
    }

    //Función para mostrar el producto en detalle
    public function show($id)
    {
        // Buscar producto o devolver 404
        $producto = Producto::findOrFail($id);
        $enCesta = false;
        
        //Comprobar stock
        if($producto->stockProducto < 1){
            abort(404, 'Producto no disponible'); // o redirigir a otra página
        }
        
        if(Auth::check()){
            $enCesta = Cesta::where('idUsuario', Auth::user()->idUsuario)
                ->where('idProducto', $id)
                ->exists();
        }
         return view('producto', [
            'producto' => $producto,
            'enCesta' => $enCesta
        ]);
    }

}
