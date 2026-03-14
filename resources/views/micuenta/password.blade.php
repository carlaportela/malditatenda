@extends('layouts.app')

@section('title','Cambiar contraseña')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-10">

<h1 class="text-xl font-handwritten text-red-400 mb-8">
Cambiar contraseña
</h1>

<div class="bg-white shadow-md rounded-xl p-8">
@if ($errors->any())
    <div class="mb-6 p-4 rounded-md bg-red-100 text-red-700 border border-red-300">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="max-w-xl mx-auto mb-6 bg-red-100 text-red-300 p-4 rounded-md text-center">
        {{ session('success') }}
    </div>
    <div class="flex gap-4 pt-4">
        <a href="{{ route('micuenta') }}"
        class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition cursor-pointer">
        Volver
        </a>
    </div>
    
@else
    <form method="POST" action="{{ route('micuenta.password.guardar') }}" class="space-y-6">

    @csrf
    @method('PUT')

    <div>
    <label class="block text-sm font-semibold text-gray-600 mb-1">
    Contraseña actual
    </label>

    <input type="password" name="password_actual"
    class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
    </div>

    <div>
    <label class="block text-sm font-semibold text-gray-600 mb-1">
    Nueva contraseña
    </label>

    <input type="password" name="password"
    class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
    </div>

    <div>
    <label class="block text-sm font-semibold text-gray-600 mb-1">
    Confirmar nueva contraseña
    </label>

    <input type="password" name="password_confirmation"
    class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-300 outline-none">
    </div>

    <div class="flex gap-4 pt-4">

    <button type="submit"
    class="bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 transition cursor-pointer">
    Cambiar contraseña
    </button>

    <a href="{{ route('micuenta') }}"
    class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition cursor-pointer">
    Cancelar
    </a>

    </div>

    </form>
@endif
    

</div>

</div>

@endsection