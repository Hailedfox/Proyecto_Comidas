@extends('Proyecto.Bienvenida2')

@section('titulo-pagina', '- Iniciar sesión')

@section('contenido')
<style>
    .fondo-ondas-animado {
        background: linear-gradient(-45deg, #152a5b, #2e89a5, #13599b, #fc6a95);
        background-size: 600% 600%;
        animation: gradientMovement 10s ease infinite;
    }

    @keyframes gradientMovement {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<div class="min-h-screen flex items-center justify-center px-4
            bg-gray-800 bg-blend-overlay bg-cover bg-center bg-no-repeat
            fondo-ondas-animado relative">

    <!-- Overlay oscuro -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Contenido -->
    <div class="relative z-10 w-full max-w-md animate-fade-in">

        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('img/CelerisLogo.png') }}" class="w-20" alt="Logo">
        </div>

        <!-- Card -->
        <div class="bg-white rounded-lg shadow-xl dark:border dark:bg-gray-800 dark:border-gray-700 p-8">

            <h1 class="text-xl font-bold tracking-tight text-gray-900 md:text-2xl dark:text-white text-center mb-2">
                Iniciar sesión
            </h1>

            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                Ingresa tus datos para continuar
            </p>

            <form method="POST" action="/login" class="space-y-4">
                @csrf

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo *</label>
                    <input type="email" name="email" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5
                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña *</label>
                    <input type="password" name="password" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5
                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <button type="submit"
                    class="w-full text-white bg-purple-900 hover:bg-purple-800 font-medium rounded-lg text-sm px-5 py-2.5">
                    Ingresar
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-4">
                ¿No tienes cuenta?
                <a href="/usuarios/crear" class="text-purple-700 hover:underline font-medium">
                    Crear cuenta
                </a>
            </p>

        </div>
    </div>
</div>

@endsection
