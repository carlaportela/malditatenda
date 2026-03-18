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

        <!-- Pedidos -->
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
                                <p><strong>Estado: </strong><span class="
                                    @if($pedido->estadoPedido == 'pendiente') text-red-300
                                    @elseif($pedido->estadoPedido == 'preparando') text-red-400
                                    @elseif($pedido->estadoPedido == 'enviado') text-red-500
                                     @elseif($pedido->estadoPedido == 'entregado') text-grey-700
                                    @endif
                                ">{{ $pedido->estadoPedido }}</span> </p>
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
                            <p class="text-gray-700"><strong>Nombre:</strong> {{ $pedido->usuario->nombreUsuario ?? 'No disponible' }} {{ $pedido->usuario->apellidos ?? 'No disponible' }}</p>
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

        <!-- Devoluciones -->
        <div id="devoluciones" class="tab-content hidden bg-white shadow-md rounded-xl p-8">
            <ul class="space-y-6">
                @foreach($devoluciones as $dev)
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg">

                        <div class="flex justify-between items-center mb-2">
                            <p class="font-handwritten text-red-400 text-lg">Devolución Nº {{ $dev->idDevolucion }}</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-600 mb-4">
                            <p><strong>Pedido:</strong> {{ $dev->idPedido }}</p>
                            <p><strong>Fecha:</strong> {{ $dev->created_at->format('d/m/Y') }}</p>
                            <p><strong>Estado: </strong><span class="
                                @if($dev->estadoDevolucion == 'pendiente') text-red-300
                                @elseif($dev->estadoDevolucion == 'aceptada') text-red-400
                                @elseif($dev->estadoDevolucion == 'finalizada') text-red-500
                                @elseif($dev->estadoDevolucion == 'rechazada') text-gray-600
                                @endif
                            "> {{ $dev->estadoDevolucion }}
                                </span></p>
                            <p><strong>Cantidad:</strong> {{ number_format($dev->cantidadDevolucion,2) }} €</p>
                            <p><strong>Motivo:</strong> {{ $dev->razonDevolucion }}</p>
                            <p><strong>Reembolso:</strong>
                                @if($dev->pago)
                                    <span class="text-red-500">Realizado</span>
                                @else
                                    <span class="text-gray-700">No realizado</span>
                                @endif
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
                        <!-- Botones de aceptar, rechazar y confirmar -->
                        <div class="flex gap-3 mt-4 flex-wrap">

                            @if($dev->estadoDevolucion == 'pendiente')
                                <form method="POST" action="{{ route('devolucion.aceptada', $dev->idDevolucion) }}">
                                    @csrf
                                    <button class="bg-red-300 text-white px-3 py-1 rounded-md hover:bg-red-200 cursor-pointer">
                                        Aceptar
                                    </button>
                                </form>
                            @endif

                            @if($dev->estadoDevolucion == 'aceptada')
                                <form method="POST" action="{{ route('devolucion.recibida', $dev->idDevolucion) }}">
                                    @csrf
                                    <button class="bg-red-400 text-white px-3 py-1 rounded-md hover:bg-red-300 cursor-pointer">
                                        Confirmar recepción
                                    </button>
                                </form>
                            @endif

                            @if($dev->estadoDevolucion == 'pendiente' || $dev->estadoDevolucion == 'aceptada')
                                <form method="POST" action="{{ route('devolucion.rechazada', $dev->idDevolucion) }}">
                                    @csrf
                                    <button class="bg-gray-500 text-white px-3 py-1 rounded-md hover:bg-gray-400 cursor-pointer">
                                        Rechazar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Productos -->
        <div id="productos" class="tab-content hidden bg-white shadow-md rounded-xl p-8">

            <!-- Botón añadir -->
            <a href="{{ route('producto.create') }}"
            class="inline-block bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 mb-6 transition">
                Añadir producto
            </a>

            <ul class="space-y-6">

                @foreach($productos as $producto)
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">

                        <div class="flex items-center justify-between flex-wrap gap-4">

                            <!-- IZQUIERDA: Imagen + info -->
                            <div class="flex items-center gap-4">

                                <!-- Miniatura -->
                                <div class="w-20 h-20 flex-shrink-0">
                                    <img 
                                        src="{{ $producto->imagen ? asset('storage/'.$producto->imagen) : asset('images/no-image.png') }}"
                                        alt="{{ $producto->nombreProducto }}"
                                        class="w-full h-full object-cover rounded-xl border border-gray-200 p-1"
                                    >
                                </div>

                                <!-- Info producto -->
                                <div>
                                    <p class="font-handwritten text-red-400 text-lg">
                                        {{ $producto->nombreProducto }}
                                    </p>
                                    @if($producto->destacado)
                                        <span class="inline-block bg-red-100 text-gray-700 text-xs px-2 py-1 rounded-md mt-1">
                                            Destacado
                                        </span>
                                    @endif

                                    <div class="text-gray-600 text-sm mt-1 space-y-1">
                                        <p><strong>Precio:</strong> {{ number_format($producto->precio, 2) }} €</p>
                                        <p>
                                            <strong>Stock:</strong> 
                                            <span class="
                                                {{ $producto->stockProducto > 0 ? 'text-gray-700' : 'text-red-500' }}">
                                                {{ $producto->stockProducto > 0 ? 'Disponible' : 'Sin existencias' }}
                                            </span>
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <!-- DERECHA: Acciones -->
                            <div class="flex gap-3">

                                <!-- Editar -->
                                <a href="{{ route('producto.edit',$producto->idProducto) }}"
                                class="bg-gray-400 font-semibold text-white px-3 py-1 rounded-md text-sm hover:bg-gray-300 transition cursor-pointer">
                                    Editar
                                </a>

                                <!-- Borrar -->
                                <form method="POST" action="{{ route('producto.delete',$producto->idProducto) }}"
                                    onsubmit="return confirm('¿Eliminar este producto?')">
                                    @csrf
                                    <button 
                                        class="bg-red-300 font-semibold text-white px-3 py-1 rounded-md text-sm hover:bg-red-200 transition cursor-pointer">
                                        Borrar
                                    </button>
                                </form>
                            </div>
                        </div>

                    </li>
                @endforeach

            </ul>
        </div>

        <!-- Mensajes -->
        <div id="mensajes" class="tab-content hidden bg-white shadow-md rounded-xl p-8">
            <ul class="space-y-6">
                @foreach($mensajes as $mensaje)
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg flex flex-col gap-4">

                        <p class="font-handwritten font-semibold text-red-400 text-lg mb-2">
                            Mensaje {{ $mensaje->idMensaje }}
                        </p>
                        <p class="text-gray-600"><strong>Remitente:</strong> {{ $mensaje->nombreMensaje }}</p>
                        <p class="text-gray-600"><strong>Correo: </strong>{{ $mensaje->correoMensaje }}</p>
                        <p class="text-gray-600 mb-3"><strong>Mensaje: </strong>{{ $mensaje->textoMensaje }}</p>
                        <p class="text-sm text-gray-400">Enviado: {{ $mensaje->created_at }}</p>
                        <p class="text-sm text-gray-400">
                            Estado: 
                            @if($mensaje->respondido == 0)
                                <span class="text-red-400">Esperando respuesta</span>
                            @else
                                <span class="text-gray-400">Respondido</span>
                            @endif 
                        </p>

                        <!-- Botones -->
                        <div class="flex gap-2">
                            <!-- Botón responder -->
                            @if ($mensaje->respondido != 1)
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $mensaje->correoMensaje }}&su=Respuesta%20a%20mensaje%20de%20la%20Tienda%20Maldita%20Carlita"
                                target="_blank"
                                class="bg-red-300 text-white px-4 py-2 rounded-md hover:bg-red-400 transition cursor-pointer">
                                    Responder
                                </a>
                            @endif

                            <!-- Botón marcar como respondido -->
                            @if($mensaje->respondido == 0)
                                <form method="POST" action="{{ route('mensaje.marcarRespondido', $mensaje->idMensaje) }}">
                                    @csrf
                                    <button type="submit" 
                                            class="bg-gray-300 text-white px-4 py-2 rounded-md hover:bg-gray-400 transition cursor-pointer">
                                        Marcar como respondido
                                    </button>
                                </form>
                            @endif
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Estadísticas -->
        <div id="estadisticas" class="tab-content hidden bg-white shadow-md rounded-xl p-6 sm:p-8">

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                <!-- Productos vendidos -->
                <div class="flex items-center gap-4 bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                    <!-- Icono de productos vendidos -->
                    <img/>
                    <div class="flex-1">
                        <p class="text-gray-600 font-bold">Productos vendidos</p>
                        <p class="text-md text-gray-600">{{ $totalProductosComprados }} unidades</p>
                    </div>
                </div>

                <!-- Productos devueltos -->
                <div class="flex items-center gap-4 bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                    <!-- Icono de productos devueltos -->
                    <img/>
                    <div class="flex-1">
                        <p class="text-gray-600 font-bold">Productos devueltos</p>
                        <p class="text-md text-gray-600">{{ $totalProductosDevueltos }} unidades</p>
                    </div>
                </div>

                <!-- Mensajes recibidos -->
                <div class="flex items-center gap-4 bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                    <img/>
                    <div class="flex-1">
                        <p class="text-gray-600 font-bold">Mensajes recibidos</p>
                        <p class="text-md text-gray-600 ">{{ $totalMensajes}} mensajes</p>
                    </div>
                </div>
                
                <!-- Total Ventas -->
                <div class="flex items-center gap-4 bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                    <!-- Icono de ventas -->
                    <img/>
                    <div class="flex-1">
                        <p class="text-gray-600 font-bold">Importe de ventas</p>
                        <p class="text-2xl text-red-300 font-semibold">{{ number_format($totalVentas,2) }} €</p>
                    </div>
                </div>

                <!-- Total Devoluciones -->
                <div class="flex items-center gap-4 bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                    <!-- Icono de devolución -->
                    <img/>
                    <div class="flex-1">
                        <p class="text-gray-600 font-bold">Importe de devoluciones</p>
                        <p class="text-2xl text-red-200 font-semibold">{{ number_format($totalDevoluciones,2) }} €</p>
                    </div>
                </div>

                <!-- Beneficio Neto -->
                <div class="flex items-center gap-4 bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                    <!-- Icono de beneficio -->
                    <img/>
                    <div class="flex-1">
                        <p class="text-gray-600 font-bold">Beneficio Bruto</p>
                        <p class="text-2xl text-red-500 font-semibold">{{ number_format($beneficio,2) }} €</p>
                    </div>
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
