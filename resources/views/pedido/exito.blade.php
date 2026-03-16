@extends('layouts.app')

@section('title', 'Pedido realizado | Maldita Carlita')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-16">
    <div class="bg-white shadow-md rounded-xl p-8 text-center">
        <h1 class="text-2xl font-handwritten text-red-400 mb-4">¡Pedido realizado con éxito!</h1>
        <p class="text-gray-700 mb-6">
            Gracias por tu compra. Recibirás un correo con los detalles de tu pedido.
        </p>
        <a href="{{ route('index') }}" 
           class="bg-red-300 text-white px-6 py-3 rounded-md hover:bg-red-400 transition">
            Volver a la tienda
        </a>
    </div>
</div>
@endsection