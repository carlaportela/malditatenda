<!-- Página de gestión para el usuario autorizado (administrador) -->
@extends('layouts.app')

@section('title', 'Gestión | Maldita Carlita')

@section('content')
    <!-- Botón para marcar como recibido un producto devuelto -->
    <form action="{{ route('devolucion.recibida', $devolucion->idDevolucion) }}" method="POST">
        @csrf
        <button class="bg-green-500 text-white px-3 py-1 rounded">
            Marcar como recibida
        </button>
    </form>
@endsection