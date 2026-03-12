<!-- Página de inicio de sesión -->
@extends('layouts.app')

@section('title', 'Maldita Carlita')

@section('content')
  <section class="max-w-6xl mx-auto px-6 py-16">

    <!-- Error login -->
    @if ($errors->has('login'))
        <div class="max-w-xl mx-auto mb-6 bg-red-100 text-red-600 p-4 rounded-md text-center">
            {{ $errors->first('login') }}
        </div>
    @endif

    <form action="{{ route('login.procesar') }}" method="POST"
        class="max-w-xl mx-auto bg-white p-6 rounded-2xl shadow-md space-y-6">

      @csrf

      <!-- Correo -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">
            Correo electrónico
        </label>

        <input
            type="email"
            name="correo"
            value="{{ old('correo') }}"
            required
            class="w-full mb-2 border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none"
        >
      </div>

      <!-- Contraseña -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">
            Contraseña
        </label>

        <input
            type="password"
            name="contrasenha"
            required
            class="w-full mb-6 border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none"
        >
      </div>

      <!-- Botón -->
      <button
          type="submit"
          class="w-full bg-gray-700 text-white mb-6 py-2 rounded-md font-semibold hover:bg-red-300 transition cursor-pointer"
      >
          Iniciar sesión
      </button>

      <!-- Enlace registro -->
      <p class="text-center text-gray-600 text-sm">
          ¿No tienes cuenta?
          <a href="/registro" class="text-red-300 hover:underline">
              Regístrate aquí
          </a>
      </p>
    </form>
  </section>
@endsection