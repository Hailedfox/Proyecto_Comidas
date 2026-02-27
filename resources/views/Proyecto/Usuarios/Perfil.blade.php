@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina', '- Mi Perfil')

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
</style>

<div class="fixed inset-0 -z-10 fondo-ondas-animado"></div>

<div class="min-h-screen flex items-center justify-center pt-24 px-4">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden">
        
        <div class="bg-gray-800 h-32 relative">
            <div class="absolute -bottom-12 w-full flex justify-center">
                @if(Auth::user() && Auth::user()->foto)
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de Perfil" class="w-24 h-24 rounded-full border-4 border-white object-cover shadow-lg bg-white">
                @else
                    <div class="w-24 h-24 rounded-full border-4 border-white bg-gray-200 flex items-center justify-center shadow-lg text-gray-500 text-3xl">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
            </div>
        </div>

        <div class="pt-16 pb-8 px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">{{ Auth::user() ? Auth::user()->name : 'Usuario Desconocido' }}</h2>
            <p class="text-blue-600 font-semibold uppercase tracking-wide text-sm mt-1">
                Rol: {{ Auth::user() ? Auth::user()->rol : 'Sin rol' }}
            </p>
            
            <div class="mt-6 flex flex-col md:flex-row justify-center gap-6 text-gray-600">
                <div class="flex items-center justify-center gap-2">
                    <i class="fas fa-envelope text-gray-400"></i>
                    <span>{{ Auth::user() ? Auth::user()->email : 'No email' }}</span>
                </div>
                <div class="flex items-center justify-center gap-2">
                    <i class="fas fa-phone text-gray-400"></i>
                    <span>{{ (Auth::user() && Auth::user()->telefono) ? Auth::user()->telefono : 'Sin teléfono' }}</span>
                </div>
            </div>

            <div class="mt-8 flex justify-center gap-4">
                @if(Auth::user())
                    <a href="{{ route('usuarios.edit', Auth::user()->id) }}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow transition transform hover:-translate-y-1">
                        <i class="fas fa-user-edit mr-2"></i> Editar mis datos
                    </a>
                @endif
                <a href="{{ route('inicio') }}" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg shadow transition transform hover:-translate-y-1">
                    <i class="fas fa-home mr-2"></i> Volver al Inicio
                </a>
            </div>
        </div>

    </div>
</div>

@endsection