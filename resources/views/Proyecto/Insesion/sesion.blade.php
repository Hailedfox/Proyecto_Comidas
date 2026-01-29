@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', '- Iniciar sesión')

@section('contenido')
<div class="min-h-screen flex flex-col items-center justify-center pt-20 px-4 bg-gray-800 bg-blend-overlay bg-cover bg-center bg-no-repeat relative"
     style="background-image: url('{{ asset('img/alimentosFondo.jpg') }}');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Contenedor -->
    <div class="relative z-10 w-full flex flex-col items-center animate-fade-in">

        <!-- LOGO -->
        <img src="{{ asset('img/CelerisLogo.png') }}" class="w-20 mb-4" alt="Logo">

        <!-- Encabezado -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-white tracking-wide">
                Bienvenido
            </h2>
            <p class="text-gray-300 text-sm mt-1">
                Inicia sesión para continuar
            </p>
        </div>

        <!-- Card -->
        <div class="w-full max-w-md bg-white rounded-lg shadow-xl dark:border dark:bg-gray-800 dark:border-gray-700 p-8">

            <h1 class="text-xl font-bold tracking-tight text-gray-900 md:text-2xl dark:text-white text-center mb-6">
                Iniciar sesión
            </h1>

            <form method="POST" action="/login" class="space-y-4">
                @csrf

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo *</label>
                    <input type="email" name="email" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña *</label>
                    <input type="password" name="password" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <button type="submit"
                    class="w-full text-white bg-purple-900 hover:bg-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition">
                    Ingresar
                </button>

            </form>

            <!-- Crear cuenta -->
            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-4">
                ¿No tienes cuenta?
                <a href="/Usuarios" class="text-purple-700 hover:underline font-medium">
                    Crear cuenta
                </a>
            </p>

        </div>

    </div>
</div>

<!-- Animación -->
<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
}
</style>

@endsection
