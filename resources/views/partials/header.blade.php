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

            @if(Auth::check())

                <!-- Botón de sesión iniciada -->
                <a href="/micuenta"
                class="text-xs rounded-md px-3 py-2 inline-block border border-solid transition-colors duration-200 bg-gray-700 text-white hover:bg-red-300">
                Hola  {{ Auth::user()->nombreUsuario }}
                </a>
                
                <!-- Botón de cerrar sesión -->
                <a href="{{ route('logout') }}"
                class="text-xs rounded-md px-3 py-2 bg-white text-black inline-block border border-solid transition-colors duration-200 hover:bg-red-300 hover:text-white">
                Cerrar sesión
                </a>
            @else

                <!-- Botón de inicio de sesión -->
                <a href="{{ route('login') }}"
                class="text-xs rounded-md px-3 py-2 inline-block border border-solid transition-colors duration-200
                {{ request()->is('login') 
                    ? 'bg-red-300 text-white pointer-events-none cursor-default' 
                    : 'bg-gray-700 text-white hover:bg-red-300' }}">
                Iniciar sesión
                </a>

                <!-- Botón de registro -->
                <a href="{{ route('registro') }}"
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
                    <a href="/canastro"
                    class="inline-block transition-transform duration-200 hover:scale-110
                    {{ request()->is('canastro') ? 'opacity-60 pointer-events-none cursor-default' : 'hover:opacity-80' }}">
                        <img src="{{ asset('assets/img/logos/icono_cesta.png')}}" alt="Cesta" class="w-6 h-6">
                    </a>
                    <span id="contadorCesta" class="absolute -top-2 -right-2 bg-red-400 text-white text-xs px-1.5 rounded-full pointer-events-none">
                        {{ $contadorCesta }}
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