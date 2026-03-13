<?php

//Para mostrar las vistas de las páginas de los enlaces en el navegador de la página principal
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/ceramica', function () {
    return view('ceramica');
});

Route::get('/bordados', function () {
    return view('bordados');
});

Route::get('/ilustracion', function () {
    return view('ilustracion');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/producto', function () {
    return view('producto');
});

Route::get('/canastro', function () {
    return view('canastro');
});

Route::get('/micuenta', function () {
    return view('micuenta');
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

    // LOGIN
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.procesar');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::middleware(['web','auth'])->group(function() {

    // CESTA
    Route::post('/cesta/add', [CestaController::class, 'add'])->name('cesta.add');
    Route::get('/canastro', [CestaController::class, 'index'])->name('cesta.index');
    Route::delete('/cesta/{id}', [CestaController::class, 'destroy'])->name('cesta.destroy');
    Route::delete('/cesta', [CestaController::class, 'vaciar'])->name('cesta.vaciar');

});

//Para ver los datos personales de la cuenta del usuario, los pedidos, devoluciones y mensajes
use App\Http\Controllers\MiCuentaController;

Route::middleware('auth')->group(function () {

    Route::get('/micuenta', [MiCuentaController::class,'index'])->name('micuenta');

    Route::post('/micuenta/actualizar', [MiCuentaController::class,'actualizar'])->name('micuenta.actualizar');

    Route::post('/micuenta/password', [MiCuentaController::class,'cambiarPassword'])->name('micuenta.password');

});
