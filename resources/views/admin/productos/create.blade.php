<!-- Página de gestión para añadir un nuevo producto -->
@extends('layouts.app')

@section('title', 'Añadir producto | Maldita Carlita')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow mt-10">

    <h2 class="text-xl text-red-400 mb-4">Nuevo producto</h2>

    <form method="POST" action="{{ route('producto.store') }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="nombreProducto" placeholder="Nombre" class="w-full mb-3 border p-2">

        <input type="text" name="descripcion" placeholder="Descripción" class="w-full mb-3 border p-2">

        <select name="idCategoria" class="w-full mb-3 border p-2">
            @foreach($categorias as $cat)
                <option value="{{ $cat->idCategoria }}">
                    {{ $cat->nombreCategoria }}
                </option>
            @endforeach
        </select>
        <label for="destacado" >Destacado</label>
        <input type="checkbox" id="destacado" name="destacado" value="1" >

        <input type="text" name="materiales" placeholder="Materiales" class="w-full mb-3 border p-2">
        
        <input type="text" name="colores" placeholder="NombreColores" class="w-full mb-3 border p-2">
       
        <input type="number" step="0.01" name="precio" placeholder="Precio" class="w-full mb-3 border p-2">

        <input type="text" name="imagen" placeholder="productos/imagen.jpg" class="w-full mb-3">

        <button class="bg-red-300 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </form>
</div>

@endsection