<!-- Página que muestra los productos de la cesta -->
@extends('layouts.app')

@section('title','Canastro | Maldita Carlita')

@section('content')

    <section class="max-w-6xl mx-auto px-6 py-16">
        @if($items->count() == 0)
            <div class="text-center text-gray-500">
            Tu cesta está vacía
            </div>
        @else
            <div class="space-y-6">
                @foreach($items as $item)
                    <div class="flex items-center justify-between bg-white p-4 rounded-2xl shadow-md">

                        <!-- Cards con información de cada producto en la cesta -->
                        <div class="flex items-center space-x-6">
                            <img
                            src="{{ asset('storage/'.$item->producto->imagen) }}"
                            class="w-24 h-24 object-cover rounded-lg"
                            >
                            <div>
                                <h3 class="font-handwritten text-lg text-gray-800">
                                {{ $item->producto->nombreProducto }}
                                </h3>
                                <p class="text-red-400 mt-1">
                                {{ $item->producto->precio }} €
                                </p>
                                <p class="text-sm text-gray-500">
                                Cantidad: {{ $item->cantidad }}
                                </p>
                            </div>
                        </div>

                        <!-- Formulario con botoón de Eliminar para eliminar productos de la cesta de forma individual -->
                        <form action="{{ route('cesta.destroy', $item->idCesta) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                            class="text-red-400 hover:text-red-500 transition cursor-pointer">
                            Eliminar
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end items-center mt-12 space-x-4">

                <!-- Formulario con botones para vaciar la cesta -->
                <form action="{{ route('cesta.vaciar') }}" method="POST">
                @csrf
                @method('DELETE')
                    <button
                    class="bg-white border border-gray-300 px-6 py-3 rounded-md hover:bg-red-300 hover:text-white transition cursor-pointer">
                    Vaciar cesta
                    </button>
                </form>

                <!-- Enlace para iniciar pedido -->
                <a
                href="/pedido"
                class="bg-gray-700 text-white px-8 py-3 rounded-md hover:bg-red-300 transition cursor-pointer">
                Iniciar pedido
                </a>
            </div>
        @endif
    </section>
@endsection