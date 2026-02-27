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

<nav class="fixed top-0 z-50 w-full bg-gray-900 border-b border-gray-700 shadow-md">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <div class="flex items-center space-x-4">
      <a href="{{ route('inicio') }}" class="flex items-center space-x-3 transition transform hover:scale-105">
        <img src="{{ asset('img/CelerisLogo.png') }}" class="h-8" alt="Celeris Logo">
        <span class="text-xl font-bold text-white tracking-tight">Celeris</span>
      </a>

      @auth
      <div class="hidden lg:flex items-center bg-gray-800 border border-gray-700 rounded-lg px-3 py-1.5 focus-within:ring-2 focus-within:ring-blue-500 transition-all">
        <i class="fas fa-search text-gray-400 text-sm"></i>
        <input type="text" placeholder="Buscar en el sistema..." 
               class="bg-transparent text-white text-sm border-none focus:ring-0 w-40 xl:w-64 placeholder-gray-500">
      </div>
      @endauth
    </div>

    <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-300">
      <a href="{{ route('inicio') }}" class="hover:text-white transition-colors {{ request()->routeIs('inicio') ? 'text-blue-500 font-bold' : '' }}">
        <i class="fas fa-home mr-1"></i> Inicio
      </a>
      @auth
      <a href="{{ route('comercios.index') }}" class="hover:text-white transition-colors {{ request()->routeIs('comercios.*') ? 'text-blue-400 font-bold' : '' }}">
        <i class="fas fa-store mr-1"></i> Comercios
      </a>
      <a href="{{ route('usuarios.index') }}" class="hover:text-white transition-colors {{ request()->routeIs('usuarios.*') ? 'text-blue-400 font-bold' : '' }}">
        <i class="fas fa-users mr-1"></i> Usuarios
      </a>
      <a href="{{ route('productos.index') }}" class="hover:text-white transition-colors {{ request()->routeIs('productos.*') ? 'text-blue-400 font-bold' : '' }}">
        <i class="fas fa-boxes mr-1"></i> Inventario
      </a>
      @endauth
    </div>

    <div class="flex items-center space-x-4">
      
      @auth
      <div class="relative">
        <button id="userBtn" class="flex items-center focus:outline-none focus:ring-2 focus:ring-gray-700 rounded-full transition-transform hover:scale-105 active:scale-95">
            @if(Auth::user()->foto)
                <img class="w-9 h-9 rounded-full border-2 border-gray-700 object-cover" src="{{ asset('storage/' . Auth::user()->foto) }}" alt="User">
            @else
                <img class="w-9 h-9 rounded-full border-2 border-gray-700 object-cover"
                     src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" alt="User">
            @endif
        </button>

        <div id="userMenu" class="hidden absolute right-0 mt-3 w-56 bg-gray-800 border border-gray-700 rounded-xl shadow-2xl overflow-hidden z-[100]">
          <div class="px-4 py-3 bg-gray-700/30">
            <p class="text-sm text-white font-bold">{{ Auth::user()->name }}</p>
            <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
            <p class="text-[10px] text-blue-400 font-bold uppercase mt-1">Rol: {{ Auth::user()->rol }}</p>
          </div>
          <div class="py-1">
            <a href="{{ route('perfil') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition">
              <i class="fas fa-id-card w-5 text-blue-400"></i> Mi Perfil
            </a>
          </div>
          <div class="border-t border-gray-700">
            <a href="{{ url('/logout') }}" class="flex items-center px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-300 transition">
              <i class="fas fa-power-off w-5"></i> Cerrar Sesión
            </a>
          </div>
        </div>
      </div>
      @endauth

      @guest
      <a href="{{ route('login') }}" class="hidden md:inline-block text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-lg text-sm px-5 py-2 transition shadow-lg">
        Iniciar Sesión
      </a>
      @endguest

      <button data-collapse-toggle="mobile-menu" class="md:hidden text-gray-400 hover:text-white">
        <i class="fas fa-bars text-xl"></i>
      </button>
    </div>

    <div class="hidden w-full md:hidden mt-4 border-t border-gray-700 pt-4" id="mobile-menu">
      <ul class="flex flex-col space-y-2 text-gray-300 pb-4">
        <li><a href="{{ route('inicio') }}" class="block px-4 py-2 hover:bg-gray-800 rounded">Inicio</a></li>
        @auth
        <li><a href="{{ route('comercios.index') }}" class="block px-4 py-2 hover:bg-gray-800 rounded">Comercios</a></li>
        <li><a href="{{ route('usuarios.index') }}" class="block px-4 py-2 hover:bg-gray-800 rounded">Usuarios</a></li>
        <li><a href="{{ route('productos.index') }}" class="block px-4 py-2 hover:bg-gray-800 rounded">Inventario</a></li>
        @endauth
        @guest
        <li><a href="{{ route('login') }}" class="block px-4 py-2 bg-blue-600 text-white font-bold rounded text-center mt-2">Iniciar Sesión</a></li>
        @endguest
      </ul>
    </div>

  </div>
</nav>

<script>
    // Validamos que los elementos existan antes de darles funcionalidad
    const userBtn = document.getElementById('userBtn');
    const userMenu = document.getElementById('userMenu');

    if(userBtn && userMenu) {
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
    }

    // Soporte para menú móvil
    const mobileBtn = document.querySelector('[data-collapse-toggle="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');
    if(mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
</script>

<main class="min-h-screen">
    @yield('contenido')
</main>

<script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>
</html>