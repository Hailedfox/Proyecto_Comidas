@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina2', '- Iniciar Sesión')

@section('contenido')
<style>
    .fondo-ondas-animado {
        background: linear-gradient(-45deg, #152a5b, #2e89a5, #13599b, #fc6a95);
        background-size: 400% 400%;
        animation: gradientMovement 10s ease infinite;
    }

    @keyframes gradientMovement {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fadeIn 0.6s ease-out; }
</style>

<div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 bg-gray-900 bg-blend-overlay bg-cover bg-center bg-no-repeat fondo-ondas-animado relative">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 w-full flex flex-col items-center animate-fade-in">

        <img src="{{ asset('img/CelerisLogo.png') }}" class="w-24 mb-6 drop-shadow-lg" alt="Logo Celeris">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white tracking-wide drop-shadow-md">Bienvenido de nuevo</h2>
            <p class="text-gray-200 text-sm mt-2">Accede a tu panel de administración</p>
        </div>

        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden dark:bg-gray-800 dark:border dark:border-gray-700">
            <div class="p-8">
                
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white text-center mb-6">Iniciar Sesión</h1>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Correo Electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input type="email" name="email" required placeholder="ejemplo@correo.com"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input type="password" name="password" required placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-3 text-center transition-all transform hover:scale-[1.02]">
                        Ingresar
                    </button>
                </form>

                <div class="flex items-center my-6">
                    <div class="w-full h-px bg-gray-200 dark:bg-gray-700"></div>
                    <span class="px-3 text-sm text-gray-500 dark:text-gray-400">O</span>
                    <div class="w-full h-px bg-gray-200 dark:bg-gray-700"></div>
                </div>

                <a href="{{ route('google.login') }}" 
                   class="w-full flex items-center justify-center gap-3 bg-white border border-gray-300 text-gray-700 font-medium py-2.5 px-4 rounded-lg hover:bg-gray-50 transition-colors shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:bg-gray-600">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="h-5 w-5" alt="Google Logo">
                    <span>Continuar con Google</span>
                </a>

            </div>
            
            <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-100 dark:bg-gray-700 dark:border-gray-600">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    ¿No tienes cuenta? 
                    <a href="{{ route('usuarios.create') }}" class="text-blue-600 hover:text-blue-800 font-semibold hover:underline dark:text-blue-400">
                        Regístrate aquí
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection