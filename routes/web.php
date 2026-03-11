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

//Para mostrar los productos en cada una de las páginas
use App\Http\Controllers\ProductoController;

Route::get('/', [ProductoController::class, 'index'])->name('index');
Route::get('/ceramica', [ProductoController::class, 'ceramica'])->name('ceramica');
Route::get('/bordados', [ProductoController::class, 'bordados'])->name('bordados');
Route::get('/ilustracion', [ProductoController::class, 'ilustracion'])->name('ilustracion');

