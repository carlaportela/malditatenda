<!-- Página de información de cuenta del ususario -->
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- Tabs -->
    <div class="mb-10 font-handwritten">
        <nav class="flex space-x-4 border-b border-gray-200">
            <button data-tab="datos" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 cursor-pointer transition">Datos personales</button>
            <button data-tab="pedidos" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 cursor-pointer transition">Pedidos</button>
            <button data-tab="devoluciones" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 cursor-pointer transition">Devoluciones</button>
            <button data-tab="mensajes" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 cursor-pointer transition">Mensajes</button>
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
    <div id="pedidos" class="tab-content hidden bg-white shadow-md rounded-xl p-8">
        @if($pedidos->isEmpty())
            <p class="text-gray-500 text-center">No has realizado ningún pedido áun.</p>
        @else
            <ul class="space-y-6">
                @foreach($pedidos as $pedido)
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow duration-200">
                        <div class="flex justify-between items-center mb-2">
                            <p class="font-handwritten text-red-400 text-lg">Pedido</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2 text-gray-600">
                            <p><span class="font-semibold">Referencia:</span> {{ $pedido->idPedido}}</p>
                            <p><span class="font-semibold">Fecha:</span> {{ $pedido->created_at->format('d/m/Y') }}</p>
                            <p><span class="font-semibold">Total:</span> {{ number_format($pedido->pago->cantidadPago, 2) }} €</p>
                            <p><span class="font-semibold">Método de pago:</span> {{ $pedido->pago->transaccion->metodoPago }}</p>
                            <p><span class="font-semibold">Estado del pedido:</span> {{ $pedido->estadoPedido }}</p>
                        </div>

                        <div>
                            <span class="font-semibold text-gray-600">Productos:</span>
                            <ul class="mt-2 space-y-2">
                                @foreach($pedido->pedidoProductos ?? [] as $item)
                                    <li class="flex items-center space-x-3 text-gray-600">
                                        <!-- Imagen miniatura -->
                                        <div class="w-16 h-16 flex-shrink-0">
                                            <img 
                                                src="{{ optional($item->producto)->imagen ? asset('storage/' . $item->producto->imagen) : asset('images/no-image.png') }}" 
                                                alt="{{ optional($item->producto)->nombreProducto ?? 'Producto no disponible' }}"
                                                class="w-full h-full object-cover rounded-xl p-2"
                                            >
                                        </div>
                                        <!-- Nombre y cantidad -->
                                        <span>
                                            {{ optional($item->producto)->nombreProducto ?? 'Producto no disponible' }}
                                            @if($item->cantidad > 1)
                                                (x{{ $item->cantidad }})
                                            @endif
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Botón iniciar devolución -->
                            <div class="mt-4">
                                <form action="{{ route('devolucion.iniciar', $pedido->idPedido) }}" method="GET">
                                    <button type="submit"
                                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition cursor-pointer">
                                        Iniciar devolución
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Devoluciones -->
<div id="devoluciones" class="tab-content hidden bg-white shadow-md rounded-xl p-8">
    @if($devoluciones->isEmpty())
        <p class="text-gray-500 text-center">No has realizado ninguna devolución aún.</p>
    @else
        <ul class="space-y-6">
            @foreach($devoluciones as $devolucion)
                <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg">

                    <!-- Cabecera -->
                    <div class="flex justify-between items-center mb-2">
                        <p class="font-handwritten text-red-400 text-lg">Devolución</p>

                        @if($devolucion->estadoDevolucion == 'pendiente')
                        <form action="{{ route('devolucion.cancelar', $devolucion->idDevolucion) }}" method="POST">
                            @csrf
                            <button class="bg-red-100 text-red-500 px-3 py-1 rounded-md hover:bg-red-200 cursor-pointer">
                                Cancelar
                            </button>
                        </form>
                        @endif
                    </div>

                    <!-- Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4 text-gray-600">
                        <p><strong>Referencia:</strong> {{ $devolucion->idDevolucion }}</p>
                        <p><strong>Pedido:</strong> {{ $devolucion->idPedido }}</p>
                        <p><strong>Fecha:</strong> {{ $devolucion->created_at->format('d/m/Y') }}</p>
                        <p><strong>Cantidad:</strong> {{ number_format($devolucion->cantidadDevolucion,2) }} €</p>

                        <p>
                            <strong>Estado:</strong>
                            <span class="
                                @if($devolucion->estadoDevolucion == 'pendiente') text-red-200
                                @elseif($devolucion->estadoDevolucion == 'aprobada') text-green-300
                                @elseif($devolucion->estadoDevolucion == 'cancelada') text-red-500
                                @endif
                            ">
                                {{ $devolucion->estadoDevolucion }}
                            </span>
                        </p>
                    </div>

                    <!-- Productos -->
                    <div>
                        <span class="font-semibold text-gray-600">Productos:</span>

                        <ul class="mt-2 space-y-2">
                            @foreach($devolucion->productos as $producto)
                                <li class="flex items-center space-x-3">

                                    <div class="w-16 h-16 flex-shrink-0">
                                        <img 
                                            src="{{ $producto->imagen ? asset('storage/'.$producto->imagen) : asset('images/no-image.png') }}"
                                            class="w-full h-full object-cover rounded-xl p-2"
                                        >
                                    </div>

                                    <span>{{ $producto->nombreProducto }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Motivo -->
                    <div class="mt-4">
                        <strong>Motivo:</strong>
                        <p>{{ $devolucion->razonDevolucion }}</p>
                    </div>

                </li>
            @endforeach
        </ul>
    @endif
</div>

    <!-- Mensajes -->
    <div id="mensajes" class="tab-content hidden bg-white shadow-md rounded-xl p-8">
    @if($mensajes->isEmpty())
        <p class="text-gray-500 text-center">No has enviado mensajes aún.</p>
    @else
        <ul class="space-y-6">
            @foreach($mensajes as $mensaje)
                <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow duration-200">
                    
                    <!-- Asunto -->
                    <span class="block font-handwritten text-red-400 text-lg mb-2">
                        {{ $mensaje->asunto }}
                    </span>
                    
                    <!-- Contenido del mensaje -->
                    <p class="text-gray-600 mb-2">
                        {{ $mensaje->textoMensaje }}
                    </p>
                    
                    <!-- Fecha -->
                    <span class="text-gray-400 text-xs">
                        Enviado: {{ $mensaje->created_at->format('d/m/Y H:i') }}
                    </span>
                </li>
            @endforeach
        </ul>
    @endif
</div>

</div>

<script>
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    function activarTab(tab) {
        tabs.forEach(t => {
            // Reset tabs inactivos
            t.classList.remove('text-red-300', 'cursor-pointer');
            t.classList.add('hover:border-red-300', 'text-gray-600', 'cursor-pointer');
        });

        contents.forEach(c => c.classList.add('hidden'));

        // Tab activo
        tab.classList.add('text-red-300', 'cursor-pointer');
        tab.classList.remove('hover:border-red-300','text-gray-600', 'cursor-pointer');
        document.getElementById(tab.dataset.tab).classList.remove('hidden');
    }

    // Activar primer tab al cargar
    activarTab(tabs[0]);

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            activarTab(tab);
        });
    });
</script>
@endsection