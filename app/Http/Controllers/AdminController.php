<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Devolucion;
use App\Models\Producto;
use App\Models\Mensaje;
use App\Models\Pago;
use App\Models\Transaccion;
use App\Models\Categoria;


class AdminController extends Controller
{

    //Función que muestra la información en la página de gestión
    public function index()
    {
        $pedidos = Pedido::with([
            'pedidoProductos.producto', // cargar productos del pedido
            'descuento',                // cargar descuento si existe
            'pago'                      // cargar pago
        ])->get();

        $devoluciones = Devolucion::with(['productos','pago'])->latest()->get();
        $productos = Producto::all();
        $mensajes = Mensaje::latest()->get();

        // Estadísticas
        // Calcular total dinámico para cada pedido
        foreach($pedidos as $pedido) {
            $subtotalVenta = $pedido->pedidoProductos->sum(function($item){
                return $item->precio * $item->cantidad;
            });

            $descuento = $pedido->descuento ? $pedido->descuento->cantidadDescuento * $subtotalVenta : 0;

            $envio = 3.95;

            $pedido->totalVenta = $subtotalVenta - $descuento + $envio;
        }

        //Total de ventas global
        $totalVentas = $pedidos->sum(function($pedido){
            return $pedido->totalVenta;
        });

        $totalDevoluciones = Devolucion::sum('cantidadDevolucion');

        return view('admin/gestion', compact(
            'pedidos',
            'devoluciones',
            'productos',
            'mensajes',
            'totalVentas',
            'totalDevoluciones'
        ));
    }

    //Función para cambiar el estado del pedidoen la vista gestión
    public function cambiarEstado(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->estadoPedido = $request->estado;
        $pedido->save();

        return back()->with('success', 'Estado del pedido actualizado');
    }

    //Funcion que lleva a la vista para editar un producto
    public function editProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();

        return view('admin.productos.edit', compact('producto','categorias'));
    }

    //Función para añadir producto -> redirige al formulario para añadirlos (vista create)
    public function createProducto()
    {
        $categorias = Categoria::all();
        return view('admin.productos.create', compact('categorias'));
    }

    //Función para guardar un nuevo producto
    public function storeProducto(Request $request)
    {
       
        $producto = new Producto();

        $producto->nombreProducto = $request->nombreProducto;
        $producto->descripcion = $request->descripcion;
        $producto->idCategoria = $request->idCategoria; // usar directamente el ID del select
        $producto->destacado = $request->has('destacado') ? 1 : 0;
        $producto->stockProducto = $request->stockProducto ?? 1;
        $producto->materiales = $request->materiales;
        $producto->colores = $request->colores;
        $producto->precio = $request->precio;

        // Imagen
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('productos','public');
            if (!$path) {
                dd('Error al guardar la imagen');
            }
            $producto->imagen = $path;
        } else {
            $producto->imagen = null; // permite que la imagen sea null
        }

        $producto->save();

        return redirect()->route('gestion')
            ->with('success', 'Producto creado correctamente');
    }

    //Función para actualizar producto
    public function updateProducto(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->nombreProducto = $request->nombreProducto;
        $producto->descripcion = $request->descripcion;
        $producto->idCategoria = $request->idCategoria;
        $producto->destacado = $request->has('destacado') ? 1 : 0;
        $producto->materiales = $request->materiales;
        $producto->colores = $request->colores;
        $producto->precio = $request->precio;

        if($request->hasFile('imagen')){
            $producto->imagen = $request->file('imagen')->store('productos','public');
        } 

        $producto->save();

        return redirect()->route('gestion')
            ->with('success','Producto actualizado');
    }

    //Función para eliminar producto
    public function deleteProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->with('success','Producto eliminado');
    }

    //Función para cambiar estado de pedidos
    public function cambiarEstadoPedido(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->estadoPedido = $request->estado;
        $pedido->save();

        return back()->with('success','Estado actualizado');
    }

    //Función para aceptar devoluciones
    public function marcarAceptada($id)
    {
        $dev = Devolucion::findOrFail($id);

        // Solo permitir si está pendiente
        if($dev->estadoDevolucion != 'pendiente'){
            return back()->with('error', 'Esta devolución no se puede aceptar');
        }

        $dev->estadoDevolucion = 'aceptada';
        $dev->save();

        return back()->with('success', 'Devolución aceptada correctamente');
    }

    //Función para marcar como rechaza una devolución
    public function marcarRechazada($id)
    {
        $dev = Devolucion::findOrFail($id);

        // Solo permitir si está pendiente o aceptada
        if(!in_array($dev->estadoDevolucion, ['pendiente', 'aceptada'])){
            return back()->with('error', 'No se puede rechazar esta devolución');
        }

        $dev->estadoDevolucion = 'rechazada';
        $dev->save();

        return back()->with('success', 'Devolución rechazada correctamente');
    }
    
    //Función para marcar como recibida una devolución
    public function marcarDevolucionRecibida($id)
    {
        $devolucion = Devolucion::with('productos')->findOrFail($id);


        // Crear transacción fake
        $transaccionSimulada = 'reembolso_Stripe'.time();
        $transaccion = Transaccion::create([

            'idTransaccion' => $transaccionSimulada,
            'metodoPago' => 'Stripe',
            'autorizado' => 1
        ]);
        // Crear pago devolución
        $pago = Pago::create([

            'cantidadPago' => $devolucion->cantidadDevolucion,
            'idTransaccion' => $transaccion->idTransaccion,
            'realizadoPago' => 1
        ]);

        // Guardar pago
        $devolucion->idPago = $pago->idPago;
        $devolucion->fechaRecepcion = now();
        $devolucion->estadoDevolucion = 'finalizada';
        $devolucion->save();

        $devolucion->refresh();

        // Restaurar stock
        foreach($devolucion->productos as $producto){
            $producto->stockProducto = 1;
            $producto->save();
        }
        return back()->with('success','Devolución procesada');
    }

    //Función para marcar como respondido un mensaje
    public function marcarMensajeRespondido($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->respondido = 1;
        $mensaje->save();

        return back()->with('success', 'Mensaje marcado como respondido');
    }
}
