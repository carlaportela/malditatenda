<!-- Página que permite enviar mensaje a la tienda -->
@extends('layouts.app')

@section('title', 'Contacto | Maldita Carlita')

@section('content')
<section class="max-w-2xl mx-auto px-6 py-16">

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="max-w-xl mx-auto mb-6 bg-red-100 text-red-300 p-4 rounded-md text-center">
              {!! session('success') !!}
        </div>
    @else

    <p class="text-gray-600 mb-8 text-center max-w-xl mx-auto">
        Si tienes alguna duda, puedes contactarme en la dirección de correo electrónico 
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=malditacarlitaoficial@gmail.com"
           target="_blank"
           rel="noopener noreferrer"
           class="text-red-300">
           malditacarlitaoficial@gmail.com
        </a>
        o enviarme un mensaje a través de este formulario
    </p>

    <!-- Formulario de contacto -->
    <form action="{{ route('contacto.store') }}"
          method="POST"
          class="max-w-xl mx-auto bg-white p-6 rounded-2xl shadow-md space-y-4">

        @csrf

        <!-- Nombre -->
        <div>
            <label for="nombreMensaje" class="block text-gray-700 font-semibold mb-1">
                Nombre
            </label>

            <input
                type="text"
                id="nombreMensaje"
                name="nombreMensaje"
                value="{{ Auth::check() ? Auth::user()->nombreUsuario : old('nombreMensaje') }}"
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none {{ Auth::check() ? '' : 'focus:ring-2 focus:ring-red-300' }}"
                {{ Auth::check() ? 'readonly' : 'required' }}
            >

            @error('nombreMensaje')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Correo -->
        <div>
            <label for="correomensaje" class="block text-gray-700 font-semibold mb-1">
                Correo electrónico
            </label>

            <input
                type="email"
                id="correomensaje"
                name="correomensaje"
                value="{{ Auth::check() ? Auth::user()->correo : old('correomensaje') }}"
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none {{ Auth::check() ? '' : 'focus:ring-2 focus:ring-red-300' }}"
                {{ Auth::check() ? 'readonly' : 'required' }}
            >

            @error('correomensaje')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Mensaje -->
        <div>
            <label for ="textoMensaje" class="block text-gray-700 font-semibold mb-1">
              Mensaje
            </label>

            <textarea
                id="textoMensaje"
                name="textoMensaje"
                rows="5"
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-300 focus:outline-none"
                required>{{ old('textoMensaje') }}</textarea>

            @error('textoMensaje')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Si el usuario está logueado, enviamos su ID -->
        @if(Auth::check())
            <input type="hidden" name="idUsuario" value="{{ Auth::user()->idUsuario }}">
        @endif

        <!-- Botón -->
        <button
            type="submit"
            class="w-full bg-gray-700 text-white py-2 rounded-md font-semibold hover:bg-red-300 transition cursor-pointer">
            Enviar mensaje
        </button>
    </form>
    @endif
</section>
@endsection