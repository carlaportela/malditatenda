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

//Para mostrar los productos en cada una de las páginas
use App\Http\Controllers\ProductoController;

Route::get('/', [ProductoController::class, 'index'])->name('index');
Route::get('/ceramica', [ProductoController::class, 'ceramica'])->name('ceramica');
Route::get('/bordados', [ProductoController::class, 'bordados'])->name('bordados');
Route::get('/ilustracion', [ProductoController::class, 'ilustracion'])->name('ilustracion');

//Para guardar los mensajes de los usuarios en la base de datos
use App\Http\Controllers\ContactoController;
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

Route::post('/contacto', [ContactoController::class, 'store'])
    ->name('contacto.store');

//Para guardar los datos de los usuarios que se registran
use App\Http\Controllers\RegistroController;

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');
