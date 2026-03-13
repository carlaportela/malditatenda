<!-- Página que muestra productos de ilustración -->
@extends('layouts.app')

@section('title', 'Ilustración | Maldita Carlita')

@section('content')
  <div class="max-w-6xl mx-auto px-6 py-10">

    <!-- Grid contenedor de productos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

      <!-- Mostrar productos con Model Producto -->
      @foreach($productos as $producto)
        <a href="{{ route('producto.show', $producto->idProducto) }}" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
          <img src="{{ asset('storage/'.$producto->imagen) }}"
              alt="{{ $producto->nombreProducto }}"
              class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
          <div class="p-4">
            <h3 class="text-lg font-handwritten text-gray-800">
              {{ $producto->nombreProducto }}
            </h3>
            <p class="text-red-400 text-base mt-2">
              {{ $producto->precio }} €
            </p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
@endsection