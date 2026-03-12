<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="author" content="Maldita Carlita" />
        <meta name="description" content="Tienda online de productos de artesanía de Maldita Carlita: cerámica, bordados e ilustración">
        <meta name="referrer" content="strict-origin-when-cross-origin" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="Maldita Carlita" />
        <meta property="og:title" content="Maldita Carlita" />
        <meta property="og:url" content="https://www.malditacarlita.com/" />
        
        <!-- Fuente de Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap" rel="stylesheet">
        
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/img/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <title>@yield('title', 'Maldita Carlita')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50">

        <!-- Header -->
        @include('partials.header')

        <!-- Contenido de la página -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        @include('partials.footer')

        <script>
            //Para la animación del menú desplegable de la pantalla de móvil
            const btn = document.getElementById('menu-btn');
            const menu = document.getElementById('mobile-menu');
            if(btn){
                btn.addEventListener('click', () => menu.classList.toggle('hidden'));
            }

            //Para la animación de la cesta al añadir producto
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // evitar recarga
                const data = new FormData(this);
                const url = this.action;
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': data.get('_token'),
                        'Accept': 'application/json'
                    },
                    body: data
                })
                .then(response => response.json())
                .then(result => {
                    if(result.success){
                        // Actualizar el contador
                        const contador = document.getElementById('contadorCesta');
                        contador.textContent = result.contador;

                        // Animación pop
                        contador.classList.add('animate-pop');
                        setTimeout(() => {
                            contador.classList.remove('animate-pop');
                        }, 300);
                    }
                })
                .catch(err => console.error(err));
            });
        });

        </script>
    </body>
</html>