@extends('layouts.app')

@section('title', 'Devolución | Maldita Carlita')

@section('content')

    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl mt-10 p-8">

        <h2 class="text-xl font-handwritten text-red-400 mb-6">
        Formulario de devolución
        </h2>

        <form method="POST" action="{{ route('devolucion.guardar') }}">
            @csrf

            <input type="hidden" name="idPedido" value="{{ $pedido->idPedido }}">

            <!-- LISTA PRODUCTOS -->
            <div class="mb-6">

                <span class="font-semibold text-gray-600 block mb-3">
                Selecciona los productos a devolver
                </span>

                <ul class="space-y-3">

                @foreach($pedido->pedidoProductos as $item)

                <li class="flex items-center justify-between bg-gray-50 p-3 rounded-md">

                <div class="flex items-center space-x-3">

                <input 
                type="checkbox"
                class="producto-checkbox"
                data-precio="{{ $item->precio }}"
                data-descuento="{{ $pedido->codigoDescuento ? $pedido->descuento->cantidadDescuento : 0 }}"
                value="{{ $item->idProducto }}"
                name="productos[]"
                >

                <img
                src="{{ asset('storage/'.$item->producto->imagen) }}"
                class="w-16 h-16 flex-shrink-0 rounded-xl p-2"
                >

                <div>

                <p class="text-gray-700 font-semibold">
                {{ $item->producto->nombreProducto }}
                </p>

                <p class="text-gray-500 text-sm">
                {{ number_format($item->precio,2) }} €
                </p>

                </div>

                </div>

                </li>

                @endforeach

                </ul>

            </div>

            <!-- MOTIVO -->

            <label class="block text-gray-600 mb-2">
            Motivo de la devolución
            </label>

            <textarea 
            name="motivo"
            class="w-full border rounded-md p-3 mb-6 border-gray-300 focus:ring-2 focus:ring-red-300 focus:outline-none"
            rows="5"
            required
            ></textarea>

            <!-- CALCULO -->

            <div class="bg-gray-50 rounded-xl p-4 mb-6">

            <p class="text-gray-600">
            Total pagado: 
            <span class="font-semibold">
            {{ number_format($pedido->pago->cantidadPago,2) }} €
            </span>
            </p>

            <p class="text-gray-600">
            Descuento aplicado: 
            <span id="totalDescuentoAplicado">0.00 €</span>
            </p>

            <p class="text-gray-600">
            Gastos de devolución: 3.95 €
            </p>

            <p class="text-lg font-semibold text-red-400 mt-2">
            Total a devolver:
            <span id="totalDevolucion">0.00 €</span>
            </p>

            </div>

            <input type="hidden" name="cantidadDevolucion" id="cantidadDevolucionInput">

            <button class="bg-red-300 text-white px-6 py-2 rounded-md hover:bg-red-400 cursor-pointer">
                Enviar solicitud
            </button>

        </form>

    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function(){

            const checkboxes = document.querySelectorAll('.producto-checkbox')

            const totalPagado = {{ $pedido->pago->cantidadPago }}

            const envio = 3.95

            const totalSpan = document.getElementById('totalDevolucion')

            const totalDescuentoAplicado = document.getElementById('totalDescuentoAplicado')
            

            function calcularDevolucion(){

                let totalProductos = 0
                let totalDescuento = 0

                checkboxes.forEach(cb => {

                    if(cb.checked){

                    let precio = parseFloat(cb.dataset.precio)

                    let descuento = parseFloat(cb.dataset.descuento)

                    totalProductos += precio

                    totalDescuento += precio * descuento

                    }

                })

                let devolucion = totalProductos - totalDescuento - envio

                if(devolucion < 0){
                    devolucion = 0
                }

                totalDescuentoAplicado.textContent= totalDescuento.toFixed(2) + " €"
                totalSpan.textContent = devolucion.toFixed(2) + " €"
                document.getElementById('cantidadDevolucionInput').value = devolucion.toFixed(2)
            }

            checkboxes.forEach(cb => {
            cb.addEventListener('change', calcularDevolucion)
            })

        })

    </script>

@endsection