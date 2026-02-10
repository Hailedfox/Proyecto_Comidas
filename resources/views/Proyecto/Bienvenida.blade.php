<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Celeris @yield('titulo-pagina')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/CelerisLogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-900">

<header>
    <nav class="fixed top-0 z-50 w-full bg-gray-900 border-b border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <img src="{{ asset('img/CelerisLogo.png') }}" class="h-7" alt="Celeris Logo">
                <span class="text-xl font-semibold text-white">Celeris</span>
            </a>

            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-sticky">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 text-white">
                    <li><a href="{{ url('/') }}" class="block py-2 hover:text-blue-500">Inicio</a></li>
                    
                    <li><a href="{{ route('comercios.create') }}" class="block py-2 hover:text-blue-500">Registrar comercios</a></li>
                    
                    <li><a href="{{ url('/usuarios') }}" class="block py-2 hover:text-blue-500">Registrar Usuario</a></li>
                    
                    <li><a href="{{ route('productos.create') }}" class="block py-2 hover:text-blue-500">Registrar Producto</a></li>
                    
                    <li><a href="{{ route('productos.index') }}" class="block py-2 hover:text-green-400">Ver Inventario</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('contenido')

<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>