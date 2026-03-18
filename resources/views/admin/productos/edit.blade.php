@extends('layouts.app')

@section('title', 'Editar producto | Maldita Carlita')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10">
        <div class="bg-white shadow-md rounded-xl p-8">
            <h2 class="font-handwritten text-red-400 text-2xl mb-6">
                Editar producto
            </h2>

            <form method="POST" action="{{ route('producto.update', $producto->idProducto) }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Nombre -->
                    <div>
                        <label class="block font-semibold text-gray-600 mb-1">Nombre</label>
                        <input type="text" name="nombreProducto"
                            value="{{ old('nombreProducto', $producto->nombreProducto) }}"
                            class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                    </div>

                    <!-- Precio -->
                    <div>
                        <label class="block font-semibold text-gray-600 mb-1">Precio (€)</label>
                        <input type="number" step="0.01" name="precio"
                            value="{{ old('precio', $producto->precio) }}"
                            class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                    </div>

                    <!-- Stock -->
                    <div>
                        <label class="block font-semibold text-gray-600 mb-1">Stock</label>
                        <input type="number" name="stockProducto"
                            value="{{ old('stockProducto', $producto->stockProducto) }}"
                            class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                    </div>

                    <!-- Categoría -->
                    <div>
                        <label class="block font-semibold text-gray-600 mb-1">Categoría</label>
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

                    <!-- Materiales -->
                    <div class="sm:col-span-2">
                        <label class="block font-semibold text-gray-600 mb-1">Materiales</label>
                        <input type="text" name="materiales"
                            value="{{ old('materiales', $producto->materiales) }}"
                            class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                    </div>

                    <!-- Colores -->
                    <div class="sm:col-span-2">
                        <label class="block font-semibold text-gray-600 mb-1">Colores</label>
                        <input type="text" name="colores"
                            value="{{ old('colores', $producto->colores) }}"
                            class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">
                    </div>

                    <!-- Destacado -->
                    <div class="flex items-center gap-2 mt-2">
                        <input type="checkbox" id="destacado" name="destacado" value="1"
                            {{ $producto->destacado ? 'checked' : '' }}
                            class="w-4 h-4 text-red-400 border-gray-300 rounded focus:ring-red-300">
                        <label for="destacado" class="font-semibold text-gray-600">Producto destacado</label>
                    </div>

                    <!-- Descripción -->
                    <div class="sm:col-span-2">
                        <label class="block font-semibold text-gray-600 mb-1">Descripción</label>
                        <textarea name="descripcion" rows="4"
                            class="w-full border border-gray-200 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                </div>

                <!-- Imagen actual -->
                <div class="mt-6 bg-gray-50 border border-gray-200 rounded-xl p-6">
                    <p class="font-semibold text-gray-600 mb-4">Imagen actual</p>
                    <div class="w-32 h-32">
                        <img src="{{ $producto->imagen ? asset('storage/'.$producto->imagen) : asset('images/no-image.png') }}"
                            class="w-full h-full object-cover rounded-xl border border-gray-200 p-2">
                    </div>
                </div>

                <!-- Nueva imagen -->
                <div class="mt-6">
                    <label class="block font-semibold text-gray-600 mb-2">Cambiar imagen</label>
                    <div class="flex items-center gap-4 border border-gray-200 rounded-xl p-2">
                        <label for="imagen"
                            class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition cursor-pointer">
                            Seleccionar archivo
                        </label>
                        <span id="file-name" class="text-gray-300 text-sm">Ningún archivo seleccionado</span>
                    </div>
                    <input type="file" id="imagen" name="imagen" class="hidden">
                </div>

                <!-- Botones -->
                <div class="mt-8 flex gap-3">
                    <button type="submit"
                        class="bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 transition cursor-pointer">
                        Guardar cambios
                    </button>

                    <a href="{{ route('gestion') }}"
                        class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition cursor-pointer">
                        Volver a productos
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const inputFile = document.getElementById('imagen');
        const fileName = document.getElementById('file-name');

        inputFile.addEventListener('change', function() {
            if (this.files.length > 0) {
                fileName.textContent = this.files[0].name;
                fileName.classList.remove('text-gray-300');
                fileName.classList.add('text-gray-600');
            } else {
                fileName.textContent = 'Ningún archivo seleccionado';
                fileName.classList.remove('text-gray-600');
                fileName.classList.add('text-gray-300');
            }
        });
    </script>
@endsection