<!-- Página para editar los datos de la cuenta -->
@extends('layouts.app')

@section('title','Editar datos')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-10">
        <h1 class="text-xl font-handwritten text-red-400 mb-8">
            Editar datos personales
        </h1>
        <div class="bg-white shadow-md rounded-xl p-8">
            <form method="POST" action="{{ route('micuenta.guardar') }}" class="space-y-6">
            @csrf
            @method('PUT')
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Nombre</label>
                    <input type="text" name="nombreUsuario"
                    value="{{ old('nombreUsuario',$usuario->nombreUsuario) }}"
                    class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">

                    @error('nombreUsuario')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Apellidos</label>
                    <input type="text" name="apellidos"
                    value="{{ old('apellidos',$usuario->apellidos) }}"
                    class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Teléfono</label>
                    <input type="text" name="telefono"
                    value="{{ old('telefono',$usuario->telefono) }}"
                    class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Dirección</label>
                    <input type="text" name="direccion"
                    value="{{ old('direccion',$usuario->direccion) }}"
                    class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
                </div>

                <div class="grid md:grid-cols-3 gap-4">

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">CP</label>

                        <input type="text" name="cp"
                        value="{{ old('cp',$usuario->cp) }}"
                        class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Localidad</label>
                        <input type="text" name="localidad"
                        value="{{ old('localidad',$usuario->localidad) }}"
                        class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Provincia</label>
                        <input type="text" name="provincia"
                        value="{{ old('provincia',$usuario->provincia) }}"
                        class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
                    </div>
                </div>
                <div class="flex gap-4 pt-4">

                    <button type="submit"
                    class="bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 transition cursor-pointer">
                        Guardar cambios
                    </button>

                    <a href="{{ route('micuenta') }}"
                        class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition cursor-pointer">
                    Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection