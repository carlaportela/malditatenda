<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::where('destacado', 1)->get();

        return view('index', compact('productos'));
    }

    public function ceramica()
    {
        $productos = Producto::where('idCategoria', 2)->get();

        return view('ceramica', compact('productos'));
    }

    public function bordados()
    {
        $productos = Producto::where('idCategoria', 3)->get();

        return view('bordados', compact('productos'));
    }

    public function ilustracion()
    {
        $productos = Producto::where('idCategoria', 4)->get();

        return view('ilustracion', compact('productos'));
    }

    public function show($id)
    {
        // Buscar producto o devolver 404
        $producto = Producto::findOrFail($id);

        return view('producto', compact('producto'));
    }
    
}
