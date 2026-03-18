@extends('layouts.app')

@section('title', 'Editar producto | Maldita Carlita')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-10">

    <div class="bg-white shadow-md rounded-xl p-8">

        <!-- Título -->
        <h2 class="font-handwritten text-red-400 text-2xl mb-6">
            Editar producto
        </h2>

        <form method="POST" action="{{ route('producto.update',$producto->idProducto) }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <!-- Nombre -->
                <div>
                    <label class="block text-gray-600 mb-1">Nombre</label>
                    <input type="text" name="nombreProducto"
                        value="{{ $producto->nombreProducto }}"
                        class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                </div>

                <!-- Precio -->
                <div>
                    <label class="block text-gray-600 mb-1">Precio (€)</label>
                    <input type="number" step="0.01" name="precio"
                        value="{{ $producto->precio }}"
                        class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                </div>

                <!-- Stock -->
                <div>
                    <label class="block text-gray-600 mb-1">Stock</label>
                    <input type="number" name="stockProducto"
                        value="{{ $producto->stockProducto }}"
                        class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                </div>

                <!-- Categoría -->
                <div>
                    <label class="block text-gray-600 mb-1">Categoría</label>
                    <select name="idCategoria"
                        class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->idCategoria }}"
                                {{ $producto->idCategoria == $cat->idCategoria ? 'selected' : '' }}>
                                {{ $cat->nombreCategoria }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Destacado -->
                <div>
                    <label class="block text-gray-600 mb-1">Destacado</label>
                    <span>
                        
                    </span><input type="checkbox" name="destacado"
                        value="1"
                        >
                </div>
            </div>

            <!-- Imagen actual -->
            <div class="mt-6">
                <label class="block text-gray-600 mb-2">Imagen actual</label>

                <div class="w-32 h-32">
                    <img 
                        src="{{ $producto->imagen ? asset('storage/'.$producto->imagen) : asset('images/no-image.png') }}"
                        class="w-full h-full object-cover rounded-xl border border-gray-200 p-2"
                    >
                </div>
            </div>

            <!-- Nueva imagen -->
            <div class="mt-4">
                <label class="block text-gray-600 mb-1">Cambiar imagen</label>
                <input type="file" name="imagen"
                    class="w-full border border-gray-200 rounded-md p-2 bg-white">
            </div>

            <!-- Botón -->
            <div class="mt-8">
                <button
                    class="bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 transition cursor-pointer">
                    Guardar cambios
                </button>
                <!-- Botón volver -->
                <a href="{{ route('gestion') }}"
                class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition cursor-pointer">
                    Volver a productos
                </a>
            
            </div>
        </form>

    </div>

</div>

@endsection