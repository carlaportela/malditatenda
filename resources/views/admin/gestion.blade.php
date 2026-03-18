<!-- Página de gestión para el usuario autorizado (administrador) -->
@extends('layouts.app')

@section('title', 'Panel de Gestión | Maldita Carlita')

@section('content')

    <div class="max-w-6xl mx-auto px-6 py-10">
        
        <!-- Tabs -->
        <div class="mb-10 font-handwritten">
            <nav class="flex space-x-4 border-b border-gray-200">
                <button data-tab="pedidos" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 transition cursor-pointer">Pedidos</button>
                <button data-tab="devoluciones" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 transition cursor-pointer">Devoluciones</button>
                <button data-tab="productos" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 transition cursor-pointer">Productos</button>
                <button data-tab="mensajes" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 transition cursor-pointer">Mensajes</button>
                <button data-tab="estadisticas" class="tab-btn text-gray-600 py-2 px-4 font-semibold border-b-2 border-transparent hover:text-red-300 hover:border-red-300 transition cursor-pointer">Estadísticas</button>
            </nav>
        </div>

        <!-- PEDIDOS -->
        <div id="pedidos" class="tab-content bg-white shadow-md rounded-xl p-8">
            <ul class="space-y-6">
                @foreach($pedidos as $pedido)
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg">

                        <p class="font-handwritten text-red-400 text-lg mb-2">Pedido Nº {{ $pedido->idPedido }}</p>

                        <!-- Datos del pedido -->
                        <div class="mt-4 bg-gray-100 p-4 rounded-xl">
                            <p class="font-handwritten text-red-300 mb-2">Datos del pedido</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-600 mb-4">
                                
                                <p><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y') }}</p>
                                <p><strong>Total:</strong> {{ number_format($pedido->totalVenta, 2) }} €</p>
                                <p><strong>Estado: </strong><span class="text-red-400">{{ $pedido->estadoPedido }}</span> </p>
                            </div>

                            <!-- Productos del pedido -->
                            <div class="mt-4">
                                <p class="text-gray-600 mb-2"><strong>Productos:</strong></p>
                                <ul class="space-y-2">
                                    @foreach($pedido->pedidoProductos as $item)
                                        @php
                                            $prod = $item->producto;
                                        @endphp
                                        <li class="flex items-center space-x-3 text-gray-600">
                                            <!-- Miniatura -->
                                            <div class="w-16 h-16 flex-shrink-0">
                                                <img 
                                                    src="{{ $prod && $prod->imagen ? asset('storage/' . $prod->imagen) : asset('images/no-image.png') }}" 
                                                    alt="{{ $prod->nombreProducto ?? 'Producto no disponible' }}"
                                                    class="w-full h-full object-cover rounded-xl p-1"
                                                >
                                            </div>
                                            <!-- Nombre -->
                                            <span>
                                                {{ $prod->nombreProducto ?? 'Producto no disponible' }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Datos del comprador -->
                        <div class="mt-4 bg-gray-100 p-4 rounded-xl">
                            <p class="font-handwritten text-red-300 mb-2">Datos del comprador</p>
                            <p class="text-gray-700"><strong>Nombre:</strong> {{ $pedido->usuario->nombreUsuario ?? 'No disponible' }}</p>
                            <p class="text-gray-700"><strong>Correo:</strong> {{ $pedido->usuario->correo ?? 'No disponible' }}</p>
                            <p class="text-gray-700"><strong>Teléfono:</strong> {{ $pedido->usuario->telefono ?? 'No disponible' }}</p>
                            <p class="text-gray-700"><strong>Dirección:</strong> {{ $pedido->usuario->direccion ?? 'No disponible' }}</p>
                            <p class="text-gray-700"><strong>CP:</strong> {{ $pedido->usuario->cp ?? 'No disponible' }}</p>
                            <p class="text-gray-700"><strong>Localidad:</strong> {{ $pedido->usuario->localidad ?? 'No disponible' }}</p>
                            <p class="text-gray-700"><strong>Provincia:</strong> {{ $pedido->usuario->provincia ?? 'No disponible' }}</p>
                        </div>

                        <!-- Cambiar estado -->
                        <form method="POST" action="{{ route('pedido.estado', $pedido->idPedido) }}" class="flex gap-2 mt-4">
                            @csrf
                            <select name="estado" class="border border-gray-300 text-gray-700 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-200 cursor-pointer">
                                <option value="pendiente" {{ $pedido->estadoPedido=='pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="preparando" {{ $pedido->estadoPedido=='peparando' ? 'selected' : '' }}>Preparando</option>
                                <option value="enviado" {{ $pedido->estadoPedido=='enviado' ? 'selected' : '' }}>Enviado</option>
                                <option value="entregado" {{ $pedido->estadoPedido=='entregado' ? 'selected' : '' }}>Entregado</option>
                            </select>
                            <button class="bg-red-300 text-white px-4 py-2 rounded-md hover:bg-red-400 cursor-pointer">
                                Actualizar
                            </button>
                        </form>

                    </li>
                @endforeach
            </ul>
        </div>

        <!-- DEVOLUCIONES -->
        <div id="devoluciones" class="tab-content hidden bg-white shadow-md rounded-xl p-8">
            <ul class="space-y-6">
                @foreach($devoluciones as $dev)
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg">

                        <div class="flex justify-between items-center mb-2">
                            <p class="font-handwritten text-red-400 text-lg">Devolución Nº {{ $dev->idDevolucion }}</p>

                            @if($dev->estadoDevolucion == 'pendiente' || $dev->estadoDevolucion == 'aprobada')
                                <form method="POST" action="{{ route('devolucion.recibida', $dev->idDevolucion) }}">
                                    @csrf
                                    <button class="bg-red-400 text-white px-3 py-1 rounded-md hover:bg-red-300 cursor-pointer">
                                        Marcar como recibida
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-600 mb-4">
                            <p><strong>Pedido:</strong> {{ $dev->idPedido }}</p>
                            <p><strong>Fecha:</strong> {{ $dev->created_at->format('d/m/Y') }}</p>
                            <p><strong>Estado:</strong> {{ $dev->estadoDevolucion }}</p>
                            <p><strong>Cantidad:</strong> {{ number_format($dev->cantidadDevolucion,2) }} €</p>
                            <p><strong>Motivo:</strong> {{ $dev->razonDevolucion }}</p>
                        </div>

                        <!-- Productos -->
                        <div>
                            <span class="text-gray-600"><strong>Productos:</strong></span>

                            <ul class="mt-2 space-y-2">
                                @foreach($dev->productos as $prod)
                                    <li class="flex items-center space-x-3">

                                        <div class="w-16 h-16">
                                            <img src="{{ $prod->imagen ? asset('storage/'.$prod->imagen) : asset('images/no-image.png') }}"
                                                class="w-full h-full object-cover rounded-xl p-2">
                                        </div>

                                        <span>{{ $prod->nombreProducto }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>

        <!-- PRODUCTOS -->
        <div id="productos" class="tab-content hidden bg-white shadow-md rounded-xl p-8">

            <a href="{{ route('producto.create') }}"
            class="inline-block bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 mb-4">
                Añadir producto
            </a>

            <ul class="space-y-4">
                @foreach($productos as $producto)
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-4 flex justify-between items-center">

                        <span>{{ $producto->nombreProducto }}</span>

                        <div class="flex gap-3">
                            <a href="{{ route('producto.edit',$producto->idProducto) }}"
                            class="text-blue-500 hover:underline">Editar</a>

                            <form method="POST" action="{{ route('producto.delete',$producto->idProducto) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">Borrar</button>
                            </form>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>

        <!-- MENSAJES -->
        <div id="mensajes" class="tab-content hidden bg-white shadow-md rounded-xl p-8">
            <ul class="space-y-6">
                @foreach($mensajes as $mensaje)
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg">

                        <p class="font-handwritten text-red-400 text-lg mb-2">
                            {{ $mensaje->nombreMensaje }}
                        </p>

                        <p class="text-gray-600">{{ $mensaje->correoMensaje }}</p>
                        <p class="text-gray-600 mb-2">{{ $mensaje->textoMensaje }}</p>

                        <p class="text-sm text-gray-400">
                            Estado: {{ $mensaje->respondido }}
                        </p>

                    </li>
                @endforeach
            </ul>
        </div>

        <!-- ESTADÍSTICAS -->
        <div id="estadisticas" class="tab-content hidden bg-white shadow-md rounded-xl p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                    <p class="text-gray-600">Total ventas</p>
                    <p class="text-2xl text-red-400 font-bold">
                        {{ number_format($pedidos->sum('totalVentas'), 2) }} €
                    </p>
                </div>

                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                    <p class="text-gray-600">Total devoluciones</p>
                    <p class="text-2xl text-red-400 font-bold">
                        {{ number_format($totalDevoluciones,2) }} €
                    </p>
                </div>

            </div>
        </div>

    </div>

    <!-- JS Tabs -->
    <script>
        const tabs = document.querySelectorAll('.tab-btn');
        const contents = document.querySelectorAll('.tab-content');

        function activarTab(tab) {
            tabs.forEach(t => {
                // Reset de todas las pestañas inactivas
                t.classList.remove('text-red-300', 'cursor-default');
                t.classList.add('text-gray-600', 'hover:text-red-300', 'hover:border-red-300', 'cursor-pointer');
            });

            contents.forEach(c => c.classList.add('hidden'));

            // Tab activa
            tab.classList.remove('text-gray-600', 'hover:text-red-300', 'hover:border-red-300', 'cursor-pointer');
            tab.classList.add('text-red-300', 'cursor-default'); // color fijo y cursor normal
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
