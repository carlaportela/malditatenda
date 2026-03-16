@extends('layouts.app')

@section('title', 'Realizar pedido | Maldita Carlita')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-16">

    <div class="grid md:grid-cols-2 gap-12">

        <!-- Lista de productos -->
        <div class="bg-white shadow-md rounded-xl p-8 space-y-6">
            <h2 class="text-xl font-handwritten text-gray-700 mb-4">Tu cesta</h2>

            @if($cesta->isEmpty())
                <p class="text-gray-500">Tu cesta está vacía.</p>
            @else
                <ul class="space-y-4">
                    @foreach($cesta as $item)
                        <li class="bg-gray-100 rounded-md p-4 flex justify-between items-center hover:shadow-md transition">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/'.$item->producto->imagen) }}" 
                                     alt="{{ $item->producto->nombreProducto }}"
                                     class="w-16 h-16 object-cover rounded-lg">
                                <div>
                                    <span class="font-semibold">{{ $item->producto->nombreProducto }}</span>
                                    <p class="text-gray-600 text-sm">Cantidad: {{ $item->cantidad }}</p>
                                </div>
                            </div>
                            <div class="text-red-400 font-semibold">
                                {{ number_format($item->producto->precio * $item->cantidad, 2) }} €
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Resumen del pedido -->
        <div class="bg-white shadow-md rounded-xl p-8 space-y-6">
            <h2 class="text-xl font-handwritten text-gray-700 mb-4">Resumen del pedido</h2>

            <div class="flex justify-between text-gray-700">
                <span>Subtotal:</span>
                <span>{{ number_format($subtotal, 2) }} €</span>
            </div>

            <div class="flex justify-between text-gray-700">
                <span>Envío (Envío estándar 3-5 días laborables):</span>
                <span>{{ number_format($envio, 2) }} €</span>
            </div>

            <div class="flex justify-between text-lg font-semibold text-gray-800 border-t pt-4">
                <span>Total:</span>
                <span class="text-red-400">{{ number_format($subtotal + $envio, 2) }} €</span>
            </div>

            <!-- Botones -->
            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0 pt-6">

                <a href="{{ route('cesta.index') }}"
                class="flex-1 bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition text-center">
                Volver a la cesta
                </a>

                <form action="{{ route('pedido.realizar') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="w-full bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 transition cursor-pointer">
                        Realizar pedido
                    </button>
                </form>

            </div>
        </div>
    </div>

</section>
@endsection