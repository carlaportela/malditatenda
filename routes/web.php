<?php

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

use App\Http\Controllers\ProductoController;

Route::get('/', [ProductoController::class, 'index']);