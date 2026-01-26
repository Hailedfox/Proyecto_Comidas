<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rppy - @yield('titulo-pagina')</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" />
    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-900">

<nav class="fixed top-0 z-50 w-full bg-gray-900 border-b border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <!-- LOGO -->
    <a href="{{ url('/') }}" class="flex items-center space-x-3">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-7">
        <span class="text-xl font-semibold text-white">Rappy</span>
    </a>

    <button data-collapse-toggle="navbar-sticky" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
      </svg>
    </button>

    <div class="hidden w-full md:block md:w-auto" id="navbar-sticky">
      <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 text-white">

        <!-- BIENVENIDA -->
        <li>
          <a href="{{ url('/1') }}" class="block py-2 hover:text-primary-500">
            Bienvenida
          </a>
        </li>

        <!-- REGISTRAR COMERCIOS -->
        <li>
          <a href="{{ url('/comercios') }}" class="block py-2 hover:text-primary-500">
            Registrar comercios
          </a>
        </li>

        <!-- OTRA BIENVENIDA -->
        <li>
          <a href="{{ url('/Usuarios') }}" class="block py-2 hover:text-primary-500">
            Registrar Usuario
          </a>
        </li>

        <!-- PRODUCTOS -->
        <li>
          <a href="{{ url('/Producto') }}" class="block py-2 hover:text-primary-500">
            Registrar Producto
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>


{{-- CONTENIDO --}}
@yield('contenido')

 <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>
