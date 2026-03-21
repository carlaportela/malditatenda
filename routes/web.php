<?php

//Para mostrar las vistas de las páginas de los enlaces en el navegador de la página principal
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

//Para mostrar los productos en cada una de las páginas
use App\Http\Controllers\ProductoController;

Route::get('/', [ProductoController::class, 'index'])->name('index');
Route::get('/ceramica', [ProductoController::class, 'ceramica'])->name('ceramica');
Route::get('/bordados', [ProductoController::class, 'bordados'])->name('bordados');
Route::get('/ilustracion', [ProductoController::class, 'ilustracion'])->name('ilustracion');

//Para mostrar el producto en detalle
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');

//Para guardar los mensajes de los usuarios en la base de datos
use App\Http\Controllers\ContactoController;
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

//Para guardar los datos de los usuarios que se registran
use App\Http\Controllers\RegistroController;

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

//Para iniciar sesión como usuario registrado y meter productos en la cesta
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CestaController;

//Login
Route::middleware('web')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.procesar');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});

//Cesta
Route::middleware(['web','auth'])->group(function() {
    Route::post('/cesta/add', [CestaController::class, 'add'])->name('cesta.add');
    Route::get('/canastro', [CestaController::class, 'index'])->name('cesta.index');
    Route::get('/cesta/contador', [CestaController::class, 'contador'])->name('cesta.contador');
    Route::delete('/cesta/{id}', [CestaController::class, 'destroy'])->name('cesta.destroy');
    Route::delete('/cesta', [CestaController::class, 'vaciar'])->name('cesta.vaciar');
});

//Para ver los datos personales de la cuenta del usuario, los pedidos, devoluciones y mensajes
use App\Http\Controllers\MiCuentaController;
Route::middleware('auth')->group(function () {
    Route::get('/micuenta', [MiCuentaController::class,'index'])->name('micuenta');
    Route::get('/micuenta/editar', [MiCuentaController::class,'editar'])
        ->name('micuenta.editar');
    Route::put('/micuenta/editar', [MiCuentaController::class,'guardarDatos'])
        ->name('micuenta.guardar');
    Route::get('/micuenta/password', [MiCuentaController::class,'password'])
        ->name('micuenta.password');
    Route::put('/micuenta/password', [MiCuentaController::class,'guardarPassword'])
        ->name('micuenta.password.guardar');
    Route::delete('/micuenta/eliminar', [MiCuentaController::class, 'eliminarCuenta'])
    ->name('micuenta.eliminar');

});

//Para ir a la vista de pedido y realizar le pedido
use App\Http\Controllers\PedidoController;
Route::middleware('auth')->group(function () {
    Route::get('/pedido', [PedidoController::class, 'checkout'])->name('pedido.checkout');
    Route::post('/pedido', [PedidoController::class, 'realizarPedido'])->name('pedido.realizar');
    Route::get('/pedido/exito', [PedidoController::class, 'exito'])->name('pedido.exito');
    Route::post('/validar-descuento', [PedidoController::class,'validarDescuento']);
});

//Para ir a la vista del formulario de devolución
use App\Http\Controllers\DevolucionController;
Route::middleware('auth')->group(function () {
    Route::get('/devolucion/iniciar/{pedido}', [DevolucionController::class, 'crear'])->name('devolucion.iniciar');
    Route::post('/devolucion/guardar', [DevolucionController::class, 'guardar'])
        ->name('devolucion.guardar');
    Route::post('/devolucion/cancelar/{id}', [DevolucionController::class, 'cancelar'])
        ->name('devolucion.cancelar');   
});

//Para ir a la vista de gestión, crear, borrar y actualizar productos, cambiar estado de pedido y gestionar devoluciones
use App\Http\Controllers\AdminController;
Route::middleware('auth')->group(function () {

    //Panel de administrador
    Route::get('/admin/gestion', [AdminController::class, 'index'])->name('gestion');

    //CRUD de productos
    Route::get('/admin/producto/create', [AdminController::class, 'createProducto'])->name('producto.create');
    Route::post('/admin/producto/store', [AdminController::class, 'storeProducto'])->name('producto.store');
    Route::get('/admin/producto/edit/{id}', [AdminController::class, 'editProducto'])->name('producto.edit');
    Route::post('/admin/producto/update/{id}', [AdminController::class, 'updateProducto'])->name('producto.update');
    Route::post('/admin/producto/delete/{id}', [AdminController::class, 'deleteProducto'])->name('producto.delete');

    //Cambiar estado de pedidos
    Route::post('/admin/pedido/estado/{id}', [AdminController::class, 'cambiarEstadoPedido'])->name('pedido.estado');

    //Devoluciones
    Route::post('/admin/devolucion/{id}/aceptada', [AdminController::class, 'marcarAceptada'])->name('devolucion.aceptada');
    Route::post('/admin/devolucion/{id}/rechazada', [AdminController::class, 'marcarRechazada'])->name('devolucion.rechazada');
    Route::post('/admin/devolucion/{id}/recibida/', [AdminController::class, 'marcarDevolucionRecibida'])->name('devolucion.recibida');

    //Mensajes
    Route::post('/admin/mensaje/{id}/respondido', [AdminController::class, 'marcarMensajeRespondido'])->name('mensaje.marcarRespondido');

});



