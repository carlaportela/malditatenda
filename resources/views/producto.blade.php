<!-- Página de detalle de producto -->
<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Maldita Carlita" />
    <meta name="description" content="Tienda online de productos de artesanía de Maldita Carlita: cerámica, bordados e ilustración">
    <meta name="referrer" content="strict-origin-when-cross-origin" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Maldita Carlita" />
    <meta property="og:title" content="Maldita Carlita" />
    <meta property="og:url" content="https://www.malditacarlita.com/" />
    <title>Producto | Maldita Carlita</title>
    
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

    <!-- Blade con Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>

    <!-- Encabezado de la página con el navegador principal-->
    <header>

      <!-- Navegador principal superior-->
      <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between items-center h-16">

            <!-- Contenedor de icono de marca y enlace a página de inicio -->
            <div class="flex items-center space-x-4">
              <!-- Logo de la página que redirecciona a la página principal -->
              <a href="/" class="flex items-center space-x-2 text-gray-800 font-handwritten font-semibold">
                <img src="/assets/img/logos/logo_web_maldita_carlita.png" alt="Logo" class="h-8 w-auto">
                &nbsp;Maldita Carlita
              </a>
            </div>
              
            <!-- Conetenedor de navegación principal, si están seleccionados text-red-400 pointer-events-none -->
            <div class="flex items-center space-x-4">
              <div class="hidden md:flex space-x-8 items-center">
                <a href="/ceramica" class="font-semibold font-handwritten transition
                    {{ request()->is('ceramica') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
                    Cerámica
                </a>
                <a href="/bordados" class="font-semibold font-handwritten transition
                    {{ request()->is('bordados') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
                    Bordados
                </a>
                <a href="/ilustracion" class="font-semibold font-handwritten transition
                    {{ request()->is('ilustracion') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
                    Ilustración
                </a>
                <a href="/about" class="font-semibold font-handwritten transition
                    {{ request()->is('about') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
                    Sobre mí
                </a>
                <a href="/contacto" class="font-semibold font-handwritten transition
                    {{ request()->is('contacto') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
                    Contacto
                </a>
              </div>
            </div>
              
            <!-- Contenedor de botones PARTE DERECHA -->
            <div class="flex items-center space-x-4">

                @if(session('usuario_nombre'))

                    <!-- Botón de sesión iniciada -->
                    <a href="/micuenta"
                    class="text-xs rounded-md px-3 py-2 inline-block border border-solid transition-colors duration-200 bg-gray-700 text-white hover:bg-red-300">
                    Hola {{ session('usuario_nombre') }}
                    </a>
                    
                    <!-- Botón de cerrar sesión -->
                    <a href="/logout"
                    class="text-xs rounded-md px-3 py-2 bg-white text-black inline-block border border-solid transition-colors duration-200 hover:bg-red-300 hover:text-white">
                    Cerrar sesión
                    </a>
                @else

                    <!-- Botón de inicio de sesión -->
                    <a href="/login"
                    class="text-xs rounded-md px-3 py-2 inline-block border border-solid transition-colors duration-200
                    {{ request()->is('login') 
                        ? 'bg-red-300 text-white pointer-events-none cursor-default' 
                        : 'bg-gray-700 text-white hover:bg-red-300' }}">
                    Iniciar sesión
                    </a>

                    <!-- Botón de registro -->
                    <a href="/registro"
                    class="text-xs rounded-md px-3 py-2 inline-block border border-solid transition-colors duration-200
                    {{ request()->is('registro') 
                        ? 'bg-red-300 text-white pointer-events-none cursor-default' 
                        : 'bg-white text-black hover:bg-red-300 hover:text-white' }}">
                    Registrarse
                    </a>
                @endif  

              <!-- Cesta -->
              <div class="flex items-center space-x-4">
                <div class="relative transition-transform duration-200 hover:scale-110 hover:opacity-80 transition-opacity duration-200">
                  <a href="/canastro" class="inline-block transition-transform duration-200 hover:scale-110 hover:opacity-80 transition-opacity duration-200">
                    <img src="{{ asset ('assets/img/logos/icono_cesta.png')}}" alt="Cesta" class="w-6 h-6">
                  </a>
                  <span class="absolute -top-2 -right-2 bg-red-400 text-white text-xs px-1.5 rounded-full pointer-events-none">
                    0
                  </span>
                </div>
              </div>
            </div>
            
            <!-- Botón de móvil -->
            <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none cursor-pointer">
              ☰
            </button>
          </div>
        </div>

        <!-- Menú móvil -->
        <div id="mobile-menu" class="hidden md:hidden px-4 pb-4">
          <a href="/ceramica" class="block py-2 font-semibold font-handwritten
              {{ request()->is('ceramica') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
              Cerámica
          </a>
          <a href="/bordados" class="block py-2 font-semibold font-handwritten
              {{ request()->is('bordados') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
              Bordados
          </a>
          <a href="/ilustracion" class="block py-2 font-semibold font-handwritten
              {{ request()->is('ilustracion') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
              Ilustración
          </a>
          <a href="/about" class="block py-2 font-semibold font-handwritten
              {{ request()->is('about') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
              Sobre mí
          </a>
          <a href="/contacto" class="block py-2 font-semibold font-handwritten
              {{ request()->is('contacto') ? 'text-red-300 pointer-events-none cursor-default' : 'text-gray-700 hover:text-red-300' }}">
              Contacto
          </a>
        </div>
      </nav>
    </header>

    <!-- Cuerpo principal con el formulario de login -->
    <main>
        <section class="max-w-6xl mx-auto px-6 py-16">
            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!-- Imagen -->
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <img
                        src="{{ asset('storage/'.$producto->imagen) }}"
                        alt="{{ $producto->nombreProducto }}"
                        class="w-full rounded-lg"
                    >
                </div>

                <!-- Información -->
                <div>
                    <h1 class="text-3xl font-handwritten text-gray-800 mb-4">
                        {{ $producto->nombreProducto }}
                    </h1>
                    <p class="text-red-400 text-2xl mb-6">
                        {{ $producto->precio }} €
                    </p>
                    <p class="text-gray-600 mb-8">
                        {{ $producto->descripcion }}
                    </p>

                    <!-- Ficha técnica -->
                    <div class="p-6 bg-gray-100 rounded-2xl shadow-sm mb-8 space-y-4">
                        <h2 class="font-semibold text-gray-800 text-lg">
                            Detalles del producto
                        </h2>
                        <div class="grid grid-cols-1 gap-2 text-gray-600">
                            <p>
                                <span class="font-semibold">Dimensiones:</span>
                                {{ $producto->medidas }}.
                            </p>
                            <p>
                                <span class="font-semibold">Materiales:</span>
                                {{ $producto->materiales }}.
                            </p>
                            <p>
                                <span class="font-semibold">Colores:</span>
                                {{ $producto->colores }}.
                            </p>
                        </div>
                    </div>
                    <button
                        class="bg-red-300 text-white px-6 py-3 rounded-md hover:bg-red-400 transition cursor-pointer">
                        Añadir a la cesta
                    </button>
                </div>
            </div>
        </section> 
    </main>
          
    <!-- Pie de la página con enlaces e información relevante-->
    <footer class="bg-white border-t border-gray-200 mt-16">
      <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="flex flex-col items-center space-y-4">
          
          <!-- Texto -->
          <p class="text-gray-500 text-sm">
            © 2026 MalditaTenda. Todos los derechos reservados.
          </p>

          <!-- Enlace a Instagram -->
          <a href="https://www.instagram.com/maldita.carlita" target="_blank" rel="noopener noreferrer" class="flex items-center space-x-2 hover:opacity-80 transition duration-300">
            <img src="{{asset('assets/img/logos_instagram/logo_instagram_acuarela.png')}}" 
              alt="Instagram" 
              class="w-6 h-6">
            <span class="font-handwritten text-lg">
              &nbsp;Sígueme en Instagram
            </span>
          </a>
        </div>
      </div>
    </footer>
    <!-- Script para que despliegue el menú del navbar contenido en el icono de menu en pantallas pequeñas -->
    <script>
      const btn = document.getElementById('menu-btn');
      const menu = document.getElementById('mobile-menu');

      btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
      });
    </script>
  </body>
</html>