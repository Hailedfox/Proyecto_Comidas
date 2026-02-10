<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celeris @yield('titulo-pagina2')</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/CelerisLogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

<nav class="fixed top-0 z-50 w-full bg-gray-900 border-b border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <div class="flex items-center space-x-4">
      <a href="{{ route('inicio') }}" class="flex items-center space-x-3">
        <img src="{{ asset('img/CelerisLogo.png') }}" class="h-8" alt="Celeris Logo">
        <span class="text-xl font-bold text-white tracking-tight">Celeris</span>
      </a>

      <div class="hidden lg:flex items-center bg-gray-800 border border-gray-700 rounded-lg px-3 py-1.5 focus-within:ring-2 focus-within:ring-blue-500 transition-all">
        <i class="fas fa-search text-gray-400 text-sm"></i>
        <input type="text" placeholder="Buscar en el sistema..." 
               class="bg-transparent text-white text-sm border-none focus:ring-0 w-40 xl:w-64 placeholder-gray-500">
      </div>
    </div>

    <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-300">
      <a href="{{ route('inicio') }}" class="hover:text-white transition-colors {{ request()->routeIs('inicio') ? 'text-blue-500' : '' }}">
        <i class="fas fa-home mr-1"></i> Inicio
      </a>
      <a href="{{ route('comercios.index') }}" class="hover:text-white transition-colors {{ request()->routeIs('comercios.*') ? 'text-blue-400' : '' }}">
        <i class="fas fa-store mr-1"></i> Comercios
      </a>
      <a href="{{ route('usuarios.index') }}" class="hover:text-white transition-colors {{ request()->routeIs('usuarios.*') ? 'text-blue-400' : '' }}">
        <i class="fas fa-users mr-1"></i> Usuarios
      </a>
      <a href="{{ route('productos.index') }}" class="hover:text-white transition-colors {{ request()->routeIs('productos.*') ? 'text-blue-400' : '' }}">
        <i class="fas fa-boxes mr-1"></i> Inventario
      </a>
    </div>

    <div class="flex items-center space-x-4">
      
      <div class="relative">
        <button id="userBtn" class="flex items-center focus:outline-none focus:ring-2 focus:ring-gray-700 rounded-full transition-transform active:scale-95">
          <img class="w-9 h-9 rounded-full border-2 border-gray-700 object-cover"
               src="https://ui-avatars.com/api/?name=Angel+Castañeda&background=3b82f6&color=fff" 
               alt="User Profile">
        </button>

        <div id="userMenu" class="hidden absolute right-0 mt-3 w-56 bg-gray-800 border border-gray-700 rounded-xl shadow-2xl overflow-hidden z-[100]">
          <div class="px-4 py-3 bg-gray-700/30">
            <p class="text-sm text-white font-bold">Angel Castañeda</p>
            <p class="text-xs text-gray-400 truncate">angel@ejemplo.com</p>
          </div>
          <div class="py-1">
            <a href="{{ route('perfil') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition">
              <i class="fas fa-id-card w-5 text-blue-400"></i> Mi Perfil
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition">
              <i class="fas fa-cog w-5 text-gray-400"></i> Configuración
            </a>
          </div>
          <div class="border-t border-gray-700">
            <a href="{{ url('/logout') }}" class="flex items-center px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-300 transition">
              <i class="fas fa-power-off w-5"></i> Cerrar Sesión
            </a>
          </div>
        </div>
      </div>

      <button data-collapse-toggle="mobile-menu" class="md:hidden text-gray-400 hover:text-white">
        <i class="fas fa-bars text-xl"></i>
      </button>
    </div>

    <div class="hidden w-full md:hidden mt-4 border-t border-gray-700 pt-4" id="mobile-menu">
      <ul class="flex flex-col space-y-2 text-gray-300 pb-4">
        <li><a href="{{ route('inicio') }}" class="block px-4 py-2 hover:bg-gray-800 rounded">Inicio</a></li>
        <li><a href="{{ route('comercios.index') }}" class="block px-4 py-2 hover:bg-gray-800 rounded">Comercios</a></li>
        <li><a href="{{ route('usuarios.index') }}" class="block px-4 py-2 hover:bg-gray-800 rounded">Usuarios</a></li>
        <li><a href="{{ route('productos.index') }}" class="block px-4 py-2 hover:bg-gray-800 rounded">Inventario</a></li>
      </ul>
    </div>

  </div>
</nav>

<script>
    const userBtn = document.getElementById('userBtn');
    const userMenu = document.getElementById('userMenu');

    // Abrir/Cerrar menú de usuario
    userBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        userMenu.classList.toggle('hidden');
    });

    // Cerrar al hacer clic fuera
    window.addEventListener('click', (e) => {
        if (!userBtn.contains(e.target) && !userMenu.contains(e.target)) {
            userMenu.classList.add('hidden');
        }
    });

    // Soporte para menú móvil básico de Flowbite
    const mobileBtn = document.querySelector('[data-collapse-toggle="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

<main class="min-h-screen">
    @yield('contenido')
</main>

<script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>
</html>