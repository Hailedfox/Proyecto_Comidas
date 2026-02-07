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

    
</head>

<body class="bg-gray-50 dark:bg-gray-900">



<nav class="fixed top-0 z-50 w-full bg-gray-900 border-b border-gray-700">
  <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">

    <!-- Logo + buscador -->
    <div class="flex items-center space-x-4">

      <a href="/" class="flex items-center space-x-3">
        <img src="{{ asset('img/CelerisLogo.png') }}" class="h-7" alt="Celeris Logo">
        <span class="text-xl font-semibold text-white">Celeris</span>
      </a>

      <!-- Buscador -->
      <div class="flex items-center bg-gray-800 border border-gray-700 rounded-lg px-3">

        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-width="2"
            d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z"/>
        </svg>

        <input type="text"
          placeholder="Buscar..."
          class="bg-transparent text-white text-sm outline-none w-48">

      </div>

    </div>

    <!-- Links -->
    <div class="flex items-center space-x-6 text-white">

      <a href="#" class="hover:text-blue-500">Home</a>
      <a href="#" class="hover:text-blue-500">About</a>
      <a href="#" class="hover:text-blue-500">Services</a>
      <a href="#" class="hover:text-blue-500">Pricing</a>
      <a href="#" class="hover:text-blue-500">Contact</a>

    </div>

    <!-- Avatar -->
    <div class="relative">

      <button id="userBtn" class="focus:outline-none">
        <img class="w-8 h-8 rounded-full"
          src="/docs/images/people/profile-picture-5.jpg">
      </button>

      <!-- Dropdown -->
      <div id="userMenu"
        class="hidden absolute right-0 mt-2 w-44 bg-gray-800 border border-gray-700 rounded-lg shadow">

        <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Dashboard</a>
        <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Settings</a>
        <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Logout</a>

      </div>

    </div>

  </div>
</nav>

<script>
const btn = document.getElementById('userBtn');
const menu = document.getElementById('userMenu');

btn.addEventListener('click', () => {
  menu.classList.toggle('hidden');
});
</script>
@yield('contenido')

<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>