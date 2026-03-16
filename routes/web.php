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

Route::post('/contacto', [ContactoController::class, 'store'])
    ->name('contacto.store');

//Para guardar los datos de los usuarios que se registran
use App\Http\Controllers\RegistroController;

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

//Para iniciar sesión como usuario registrado y meter productos en la cesta
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CestaController;

Route::middleware('web')->group(function() {

    //Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.procesar');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::middleware(['web','auth'])->group(function() {

    //Cesta
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

});

//Para ir a la vista de pedido y realizar le pedido
use App\Http\Controllers\PedidoController;

Route::middleware('auth')->group(function () {

Route::get('/pedido', [PedidoController::class, 'checkout'])->name('pedido.checkout');
Route::post('/pedido', [PedidoController::class, 'realizarPedido'])->name('pedido.realizar');
Route::get('/pedido/exito', [PedidoController::class, 'exito'])->name('pedido.exito');
});
