<!-- Página de información de cuenta del ususario -->
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- Tabs -->
    <div class="mb-10 font-handwritten">
        <nav class="flex space-x-4 border-b border-gray-200">
            <button data-tab="datos" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:border-red-300 cursor-pointer transition">Datos personales</button>
            <button data-tab="pedidos" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:border-red-300 cursor-pointer transition">Pedidos</button>
            <button data-tab="devoluciones" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:border-red-300 cursor-pointer transition">Devoluciones</button>
            <button data-tab="mensajes" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:border-red-300 cursor-pointer transition">Mensajes</button>
        </nav>
    </div>

    <!-- Datos personales -->
    <div id="datos" class="tab-content bg-white shadow-md rounded-xl p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
            <p><span class="font-semibold">Nombre:</span> {{ $usuario->nombreUsuario }}</p>
            <p><span class="font-semibold">Apellidos:</span> {{ $usuario->apellidos }}</p>
            <p><span class="font-semibold">Teléfono:</span> {{ $usuario->telefono }}</p>
            <p><span class="font-semibold">Correo:</span> {{ $usuario->correo }}</p>
            <p><span class="font-semibold">Dirección:</span> {{ $usuario->direccion }}</p>
            <p><span class="font-semibold">CP:</span> {{ $usuario->cp }}</p>
            <p><span class="font-semibold">Localidad:</span> {{ $usuario->localidad }}</p>
            <p><span class="font-semibold">Provincia:</span> {{ $usuario->provincia }}</p>
        </div>

        <!-- Botones separados -->
        <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
            <a href="{{ route('micuenta.editar') }}" 
                class="inline-block bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 transition text-center">
                Editar datos
            </a>
            <a href="{{ route('micuenta.password') }}" 
                class="inline-block bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 transition text-center">
                Cambiar contraseña
            </a>
        </div>
    </div>

    <!-- Pedidos -->
    <div id="pedidos" class="tab-content hidden bg-white shadow-md rounded-xl p-6">
        @if($pedidos->isEmpty())
            <p class="text-gray-500">No tienes pedidos realizados.</p>
        @else
            <ul class="space-y-4">
                @foreach($pedidos as $pedido)
                    <li class="border rounded-md p-4 flex justify-between items-center hover:shadow-md transition">
                        <div>
                            <span class="font-semibold">Pedido #{{ $pedido->idPedido }}</span> - {{ $pedido->created_at->format('d/m/Y') }}
                        </div>
                        <div class="text-red-400 font-semibold">{{ $pedido->total }} €</div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Devoluciones -->
    <div id="devoluciones" class="tab-content hidden bg-white shadow-md rounded-xl p-6">   
        @if($devoluciones->isEmpty())
            <p class="text-gray-500">No tienes devoluciones registradas.</p>
        @else
            <ul class="space-y-4">
                @foreach($devoluciones as $devolucion)
                    <li class="border rounded-md p-4 flex justify-between items-center hover:shadow-md transition">
                        <div>Devolución #{{ $devolucion->idDevolucion }} - {{ $devolucion->created_at->format('d/m/Y') }}</div>
                        <div class="text-red-400 font-semibold">{{ $devolucion->estado }}</div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Mensajes -->
    <div id="mensajes" class="tab-content hidden bg-white shadow-md rounded-xl p-6">
        @if($mensajes->isEmpty())
            <p class="text-gray-500">No has enviado mensajes aún.</p>
        @else
            <ul class="space-y-4">
                @foreach($mensajes as $mensaje)
                    <li class="border rounded-md p-4 hover:shadow-md transition">
                        <span class="font-semibold">{{ $mensaje->asunto }}</span>
                        <p class="text-gray-600 mt-1">{{ $mensaje->contenido }}</p>
                        <span class="text-gray-400 text-xs">Enviado: {{ $mensaje->created_at->format('d/m/Y H:i') }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</div>

<script>
    // Tab functionality
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Reset all tabs
            tabs.forEach(t => t.classList.remove('border-red-300', 'text-red-500'));
            contents.forEach(c => c.classList.add('hidden'));

            // Activate clicked tab
            tab.classList.add('border-red-300', 'text-red-500');
            document.getElementById(tab.dataset.tab).classList.remove('hidden');
        });
    });

    // Set default tab
    tabs[0].click();
</script>
@endsection