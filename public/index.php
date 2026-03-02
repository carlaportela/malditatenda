
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
    <title>Maldita Carlita</title>
    <!-- Hoja de estilos CSS de Tailwind -->
    <link rel="stylesheet" href="/malditatenda/dist/output.css">
    <!-- Favicon clásico -->
    <link rel="icon" type="image/svg+xml" href="../src/img/favicon/favicon.svg" />
    <link rel="shortcut icon" href="../src/img/favicon/favicon.ico" />
    <link rel="icon" type="image/png" href="../src/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="manifest" href="../src/img/favicon/site.webmanifest" />
    <!-- Favicon para Apple/Safari -->
    <link rel="mask-icon" href="../src/img/favicon/favicon.svg" color="#990000"/>
    <link rel="apple-touch-icon" sizes="180x180" href="../src/img/favicon/apple-touch-icon.png" />
    <!-- Funcionalidad Javascript-->
    <script src="../src/js/main.js"></script>
  </head>
  <body>

    <!-- Encabezado de la página con el navegador principal-->
    <header>

      <!-- Navegador principal-->
      <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between items-center h-16">

            <!--  Enlaces de navegación principales -->
            
              <a href="index.php" class="flex items-center space-x-2">
                <!-- Logo de la página que redirecciona a la página principal -->
                <img src="../src/img/favicon/favicon-96x96.png" alt="Logo" class="h-8 w-auto">
              </a>
              <div class="hidden md:flex space-x-8 items-center">
                <a href="./ceramica.php" class="text-gray-700 hover:text-red-300 transition">Cerámica</a>
                <a href="./bordados.php" class="text-gray-700 hover:text-red-300 transition">Bordados</a>
                <a href="./ilustracion.php" class="text-gray-700 hover:text-red-300 transition">Ilustración</a>
                <a href="./contacto.php" class="text-gray-700 hover:text-red-300 transition">Contacto</a>
              </div>
            
            <!-- Buscador -->
            <form class="max-w-xs hidden md:flex">
              <div class="relative">
                <!-- Icono de lupa -->
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"/>
                  </svg>
                </div>

                <!-- Input -->
                <input 
                  type="search" 
                  id="search" 
                  class="focus:outline-none block w-full rounded-md border border-gray-300 pl-10 pr-20 py-2 text-sm text-gray-700 focus:ring-gray-500" 
                  placeholder="" 
                  required
                />

                <!-- Botón -->
                <button type="submit" 
                  class="cursor-pointer absolute right-1 top-1/2 -translate-y-1/2 bg-red-400 text-white text-sm px-3 py-1.5 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                  Buscar
                </button>
              </div>
            </form>

            <!-- Botón de inicio de sesión -->
             <div class="relative">
                <a href="login.php"
                  class=" pointer-events-auto bg-gray-800 text-white rounded-md px-3 py-1 inline-block transition-colors duration-200 hover:bg-gray-500">
                  Iniciar sesión
                </a>
             </div>
            
            <!-- Cesta -->
            <div class="flex items-center space-x-4">
              <div class="relative">
                <a href="./canastro.php" class="inline-block transition-transform duration-200 hover:scale-110 hover:opacity-80 transition-opacity duration-200">
                  <img src="../src/img/favicon/icono_cesta.png" alt="Cesta" class="w-6 h-6">
                </a>
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1.5 rounded-full pointer-events-none">
                  0
                </span>
              </div>
            </div>
                <!-- Botón de móvil -->
                <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none">
                  ☰
                </button>
              </div>
            </div>
            <!-- Menú móvil -->
            <div id="mobile-menu" class="hidden md:hidden px-4 pb-4">
              <a href="/" class="block py-2 text-gray-700 hover:text-indigo-600">Inicio</a>
              <a href="./ceramica.php" class="block py-2 text-gray-700 hover:text-indigo-600">Cerámica</a>
              <a href="./bordados.php" class="block py-2 text-gray-700 hover:text-indigo-600">Bordados</a>
              <a href="./ilustracion.php" class="block py-2 text-gray-700 hover:text-indigo-600">Ilustración</a>
              <a href="./contacto.php" class="block py-2 text-gray-700 hover:text-indigo-600">Contacto</a>
            </div>
          </div> 
        </div>
      </nav>
    </header>
    <!-- Cuerpo principal de la página con los productos destacados-->
    <main></main>
              <!-- Producto sin stock -->
              
              <!-- Producto con stock -->
              
    <!-- Pie de la página con enlaces e información relevante-->
    <footer>
    </footer>
    <script>
      const btn = document.getElementById('menu-btn');
      const menu = document.getElementById('mobile-menu');

      btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
      });
    </script>
    <script src="./node_modules/flowbite/dist/flowbite.min.js"></script>

  </body>
</html>