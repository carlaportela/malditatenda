<!-- Página de detalle de producto -->
@extends('layouts.app')

@section('title', 'Maldita Carlita')

@section('content')

  <section class="max-w-6xl mx-auto px-6 py-16">
    <div class="grid md:grid-cols-2 gap-12 items-center">

      <!-- Imagen -->
      <div class="bg-white p-6 rounded-2xl shadow-md">
          <img
              src="{{ asset('storage/'.$producto->imagen) }}"
              alt="{{ $producto->nombreProducto }}"
              class="w-full rounded-lg"
          >
      </div>

      <!-- Información -->
      <div>
        <h1 class="text-3xl font-handwritten text-gray-800 mb-4">
            {{ $producto->nombreProducto }}
        </h1>
        <p class="text-red-400 text-2xl mb-6">
            {{ $producto->precio }} €
        </p>
        <p class="text-gray-600 mb-8">
            {{ $producto->descripcion }}
        </p>

        <!-- Ficha técnica -->
        <div class="p-6 bg-gray-100 rounded-2xl shadow-sm mb-8 space-y-4">
          <h2 class="font-semibold text-gray-800 text-lg">
              Detalles del producto
          </h2>
          <div class="grid grid-cols-1 gap-2 text-gray-600">
              <p>
                  <span class="font-semibold">Dimensiones:</span>
                  {{ $producto->medidas }}.
              </p>
              <p>
                  <span class="font-semibold">Materiales:</span>
                  {{ $producto->materiales }}.
              </p>
              <p>
                  <span class="font-semibold">Colores:</span>
                  {{ $producto->colores }}.
              </p>
          </div>
        </div>

        <!-- Formulario para añadir productos a la cesta -->
        <form action="{{ route('cesta.add') }}" method="POST" class="add-to-cart-form">
          @csrf

          <input type="hidden" name="idProducto" value="{{ $producto->idProducto }}">

          <button
              type="submit"
              class="bg-red-300 text-white px-6 py-3 rounded-md hover:bg-red-400 transition cursor-pointer">
              Añadir a la cesta
          </button>

        </form>
      </div>
    </div>
  </section> 
@endsection