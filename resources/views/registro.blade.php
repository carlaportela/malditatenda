<!-- Página de registro -->
@extends('layouts.app')

@section('title', 'Maldita Carlita')

@section('content')
  <section class="max-w-6xl mx-auto px-6 py-16">
    @if(session('success'))
      <div class="max-w-xl mx-auto mb-6 bg-red-100 text-red-300 p-4 rounded-md text-center">
          {!! session('success') !!}
      </div>
    @else
      <form action="{{ route('registro.store') }}" method="POST"
          class="max-w-xl mx-auto bg-white p-6 rounded-2xl shadow-md space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
            <input type="text" name="nombreUsuario" value="{{ old('nombreUsuario') }}"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none" required>
            @error('nombreUsuario')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Apellidos</label>
            <input type="text" name="apellidos" value="{{ old('apellidos') }}"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none" required>
            @error('apellidos')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Teléfono</label>
            <input type="text" name="telefono" value="{{ old('telefono') }}"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Dirección</label>
            <input type="text" name="direccion" value="{{ old('direccion') }}"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Código Postal</label>
                <input type="text" name="cp" value="{{ old('cp') }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Localidad</label>
                <input type="text" name="localidad" value="{{ old('localidad') }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Provincia</label>
            <input type="text" name="provincia" value="{{ old('provincia') }}"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Correo electrónico</label>
            <input type="email" name="correo" value="{{ old('correo') }}"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none" required>
            @error('correo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Contraseña</label>
            <input type="password" name="contrasenha"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none" required>
            @error('contrasenha')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Confirmar contraseña</label>
            <input type="password" name="contrasenha_confirmation"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none" required>
        </div>

        <button type="submit"
                class="w-full bg-gray-700 text-white py-2 rounded-md font-semibold hover:bg-red-300 transition cursor-pointer">
            Validar registro
        </button>
      </form>
    @endif
  </section>
@endsection