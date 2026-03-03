
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
    
    <!-- Fuente de Google Fonst -->
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="./assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="./assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Funcionalidad Javascript-->
    <script src="../public/js/main.js"></script>
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
              <a href="index.php" class="flex items-center space-x-2">
                <img src="./assets/img/logos/logo_web_maldita_carlita.png" alt="Logo" class="h-8 w-auto">
              </a>
            </div>
              
            <!-- Conetenedor de navegación principal, si están seleccionados text-red-400 pointer-events-none -->
            <div class="flex items-center space-x-4">
              <div class="hidden md:flex space-x-8 items-center">
                <a href="./ceramica.php" class="text-gray-700 font-semibold font-handwritten hover:text-red-300 transition">Cerámica</a>
                <a href="./bordados.php" class="text-gray-700 font-semibold font-handwritten hover:text-red-300 transition">Bordados</a>
                <a href="./ilustracion.php" class="text-gray-700 font-semibold font-handwritten hover:text-red-300 transition">Ilustración</a>
                <a href="./about.php" class="text-gray-700 font-semibold font-handwritten hover:text-red-300 transition">Sobre mí</a>
                <a href="./contacto.php" class="text-gray-700 font-semibold font-handwritten hover:text-red-300 transition">Contacto</a>
              </div>
            </div>
              
            <!-- Contenedor de botones PARTE DERECHA -->
            <div class="flex items-center space-x-4">

              <!-- Botón de inicio de sesión -->
              <a href="login.php"
                class=" pointer-events-auto text-xs bg-gray-800 text-white rounded-md px-3 py-1 inline-block transition-colors duration-200 hover:bg-red-300 border-1 border-solid">
                Iniciar sesión
              </a>
              
              <!-- Botón de registro -->
              <a href="registro.php"
                class=" pointer-events-auto text-xs bg-white rounded-md px-3 py-1 inline-block transition-colors duration-200 hover:bg-red-200 border-1 border-solid">
                Registrarse
              </a>
              
              <!-- Cesta -->
              <div class="flex items-center space-x-4">
                <div class="relative transition-transform duration-200 hover:scale-110 hover:opacity-80 transition-opacity duration-200">
                  <a href="./canastro.php" class="inline-block transition-transform duration-200 hover:scale-110 hover:opacity-80 transition-opacity duration-200">
                    <img src="./assets/img/logos/icono_cesta.png" alt="Cesta" class="w-6 h-6">
                  </a>
                  <span class="absolute -top-2 -right-2 bg-red-400 text-white text-xs px-1.5 rounded-full pointer-events-none">
                    0
                  </span>
                </div>
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
          <a href="./ceramica.php" class="block py-2 text-gray-700 font-semibold font-handwritten hover:text-red-300">Cerámica</a>
          <a href="./bordados.php" class="block py-2 text-gray-700 font-semibold font-handwritten hover:text-red-300">Bordados</a>
          <a href="./ilustracion.php" class="block py-2 text-gray-700 font-semibold font-handwritten hover:text-red-300">Ilustración</a>
          <a href="./about.php" class="block py-2 text-gray-700 font-semibold font-handwritten hover:text-red-300">Sobre mí</a>
          <a href="./contacto.php" class="block py-2 text-gray-700 font-semibold font-handwritten hover:text-red-300">Contacto</a>
        </div>
      </nav>
    </header>

    <!-- Cuerpo principal de la página con los productos destacados -->
    <main>
      <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Grid contenedor de productos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

          <!-- Producto 1 -->
          <a href="producto.php?id=" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/IMG_20250802_141615.png" 
                alt="Producto destacado 1"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Fogar"
              </h3>
              <p class="text-red-400 text-base mt-2">
                19,90€
              </p>
            </div>
          </a>

          <!-- Producto 2 -->
          <a href="producto.php?id=" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/PhotoRoom-20250130_204652.png" 
                alt="Producto destacado 2"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Soñando"
              </h3>
              <p class="text-red-400 text-base mt-2">
                25,90€
              </p>
            </div>
          </a>

          <!-- Producto 3 -->
          <a href="producto.php?id=" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/PhotoRoom-20250728_154007_8.png" 
                alt="Producto destacado 3"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Beleza"
              </h3>
              <p class="text-red-400 text-base mt-2">
                35,90€
              </p>
            </div>
          </a>

          <!-- Producto 4 -->
          <a href="producto.php?id=1" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/PhotoRoom-20250728_154007_11.png" 
                alt="Producto destacado 4"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Heroes"
              </h3>
              <p class="text-red-400  text-base mt-2">
                25,90€
              </p>
            </div>
          </a>

          <!-- Producto 5 -->
          <a href="producto.php?id=" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/PhotoRoom-20250728_154007_20.png" 
                alt="Producto destacado 5"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Mimosas"
              </h3>
              <p class="text-red-400 text-base mt-2">
                29,90€
              </p>
            </div>
          </a>

          <!-- Producto 6 -->
          <a href="producto.php?id=" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/PhotoRoom-20250728_154007_17.png" 
                alt="Producto destacado 6"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Nai"
              </h3>
              <p class="text-red-400 text-base mt-2">
                19,99€
              </p>
            </div>
          </a>

          <!-- Producto 7 -->
          <a href="producto.php?id=" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/PhotoRoom-20250728_154007_14.png" 
                alt="Producto destacado 7"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Cabaliño do demo"
              </h3>
              <p class="text-red-400 text-base mt-2">
                19,99€
              </p>
            </div>
          </a>

          <!-- Producto 8 -->
          <a href="producto.php?id=" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/PhotoRoom-20250728_154007_9.png" 
                alt="Producto destacado 8"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Dente de León"
              </h3>
              <p class="text-red-400 text-base mt-2">
                29,90€
              </p>
            </div>
          </a>

          <!-- Producto 9 -->
          <a href="producto.php?id=" class="block group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <img src="./assets/img/productos/PhotoRoom-20250728_154006_4.png" 
                alt="Producto destacado 9"
                class="w-full h-80 object-cover transform hover:scale-105 transition duration-300">
            <div class="p-4">
              <h3 class="text-lg font-handwritten text-gray-800">
                Bastidor "Bonita"
              </h3>
              <p class="text-red-400 text-base mt-2">
                24,90€
              </p>
            </div>
          </a>
        </div>
      </div>
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
            <img src="./assets/img/logos_instagram/logo_instagram_acuarela.png" alt="Instagram" class="w-6 h-6">
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

    <!-- Script para que funcionen los menús desplegable con Flowbite -->
    <script src="./assets/js/flowbite.min.js"></script>
  </body>
</html>