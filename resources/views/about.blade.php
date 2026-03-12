<!-- Página que muestra información sobre la marca -->
@extends('layouts.app')

@section('title', 'Maldita Carlita')

@section('content')

    <!-- Introducción -->
    <section class="max-w-6xl mx-auto px-6 py-6">
        <p class="text-gray-600 text-md leading-relaxed text-center">
            Maldita Carlita es un proyecto de artesanía donde la cerámica, el bordado
            y la ilustración se mezclan con identidad, creatividad y mucho cariño.
            Cada pieza está hecha a mano y pensada para sacar una sonrisa.
        </p>
    </section>

    <!-- Historia -->
    <section class="max-w-6xl mx-auto px-6 py-6">
        <div class=" items-center">

            <!-- Imagen -->
            

            <!-- Texto -->
            <div class="max-w-5xl">
                <h2 class="text-3xl font-handwritten text-center text-gray-800 mb-4">
                    La historia detrás de la marca
                </h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Todo empezó como una forma de resiliencia ante una situación de acoso laboral. Me reencontré con una pasión olvidada, el arte, que se convirtió primero en terapia y luego en sanación.<br>
                    Y poco a poco, la cerámica, el bordado y la ilustración fueron encontrando su espacio dentro
                    de un mismo universo creativo.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Hoy Maldita Carlita es un pequeño proyecto artesanal donde cada pieza
                    se diseña y se realiza a mano, con mucho mimo por los detalles
                    y con la intención de crear piezas únicas que alegren el día a día.
                </p>
            </div>
        </div>
    </section>

    <!-- Valores/Proceso -->
    <section class="bg-gray-50 py-10">

        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-handwritten text-center text-gray-800 mb-4">
                Cómo se hacen las piezas
            </h2>
            <p class="text-gray-600  mb-4 leading-relaxed">
                El proceso completo para cada pieza implica una duración estimada de entre uno y dos meses, en los cuales se realizan dos horneados a una temperatura de 900ºC y un esmaltado entre ambos.<br>
                Es un proceso delicado que requiere paciencia, delicadeza, planificación y concentración.
            </p>
            <div class="grid md:grid-cols-3 gap-8 text-center">

                <!-- Diseño -->
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-handwritten text-xl text-gray-800 mb-3 p-2">
                        Diseño
                    </h3>

                    <!-- Imagen -->
                        <img 
                            src="/assets/img/about/PhotoRoom-20260311_102227.png" 
                            alt="Pieza cerámica de golondrina"
                            class="w-full"/>
                    <p class="text-gray-600 text-sm p-2">
                        Cada producto empieza con una idea y un pequeño boceto.
                        La inspiración proviene de los elementos cotidianos,
                        de la naturaleza y de la cultura gallega.
                    </p>
                </div>

                <!-- Artesanía -->
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-handwritten text-xl text-gray-800 mb-3 p-2">
                        Proceso
                    </h3>

                    <!-- Imagen -->
                        <img 
                            src="/assets/img/about/PhotoRoom-20250619_142239.png" 
                            alt="Pieza cerámica de mano"
                            class="w-full"/>
                    <p class="text-gray-600 text-sm p-2">
                        Todas las piezas se producen artesanalmente,
                        lo que hace que cada una tenga pequeñas variaciones
                        y que la convierten en algo único.
                    </p>
                </div>

                <!-- Amor -->
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-handwritten text-xl text-gray-800 mb-3 p-2">
                        Identidad
                    </h3>

                    <!-- Imagen -->
                        <img 
                            src="/assets/img/about/PhotoRoom-20250619_153940.png" 
                            alt="Pieza cerámica de nenúfar"
                            class="w-full"/>
                    <p class="text-gray-600 text-sm p-2">
                        El objetivo es crear piezas que nos conecten con nuestra cultura,
                        nuestro idioma y nuestra tradición.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Creaciones -->
    <section class="max-w-4xl mx-auto px-6 py-16 text-center p-6">
        <h2 class="text-3xl font-handwritten text-gray-800 mb-6">
            Descubre nuestras creaciones
        </h2>
        <p class="text-gray-600 mb-8">
            Puedes ver todas las piezas disponibles en la tienda online.
        </p>
        <a href="/"
            class="bg-gray-700 text-white px-6 py-3 rounded-md font-semibold
            hover:bg-red-300 transition">
            Ver productos
        </a>
    </section>
@endsection