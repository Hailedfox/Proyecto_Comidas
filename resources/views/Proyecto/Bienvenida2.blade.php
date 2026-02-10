<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Celeris @yield('titulo-pagina')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/CelerisLogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-900 font-sans">

<header>
    <nav class="fixed top-0 z-50 w-full bg-gray-900 border-b border-gray-700 h-16">
        <div class="max-w-screen-xl h-full flex items-center justify-between mx-auto px-4">

            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <img src="{{ asset('img/CelerisLogo.png') }}" class="h-8" alt="Celeris Logo">
                <span class="text-xl font-bold text-white leading-none">Celeris</span>
            </a>

            <div class="hidden md:flex items-center space-x-8 text-sm text-white">
                <a href="{{ url('/') }}" class="text-blue-500 font-bold">Inicio</a>
                <a href="{{ route('comercios.index') }}">Comercios</a>
                <a href="{{ route('usuarios.index') }}">Usuarios</a>
                <a href="{{ route('productos.index') }}">Inventario</a>
                <a href="{{ url('/Sesion') }}" class="hover:text-pink-500">Iniciar Sesión</a>
            </div>

        </div>
    </nav>
</header>

<main class="pt-16">
    @yield('contenido')
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
