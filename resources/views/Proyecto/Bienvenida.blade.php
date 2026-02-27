@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina2', '- Inicio')

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

<section class="min-h-screen flex flex-col items-center justify-center pt-20 fondo-ondas-animado px-4 text-center relative z-10">
    
    <img src="{{ asset('img/CelerisLogo.png') }}" 
         alt="Logo Celeris" 
         class="w-32 md:w-48 h-auto mb-6 drop-shadow-2xl transition transform hover:scale-105">

    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight drop-shadow-md">
            Bienvenido a <span class="text-pink-400">Celeris</span>
        </h1>

        <p class="text-gray-100 text-lg md:text-xl mb-8 leading-relaxed drop-shadow-md">
            <span class="font-bold text-white">Celeris</span> es una plataforma diseñada para ayudarte a gestionar tus comercios de forma rápida, clara y segura.
        </p>

        @auth
            <a href="{{ route('comercios.index') }}" class="inline-block px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-lg transition transform hover:-translate-y-1 hover:scale-105">
                Ir a mi Panel
            </a>
        @else
            <a href="{{ route('login') }}" class="inline-block px-8 py-3 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-full shadow-lg transition transform hover:-translate-y-1 hover:scale-105">
                Comenzar Ahora
            </a>
        @endauth
    </div>
</section>

<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 max-w-screen-xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Información en Tiempo Real (APIs)</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-500 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-blue-100 rounded-full mr-4">
                        <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700">Tu Ubicación</h3>
                </div>
                <div class="text-gray-600 space-y-2">
                    <p><span class="font-semibold">IP:</span> {{ $geoData['query'] ?? 'Cargando...' }}</p>
                    <p><span class="font-semibold">Ciudad:</span> {{ $geoData['city'] ?? 'Cargando...' }}</p>
                    <p><span class="font-semibold">País:</span> {{ $geoData['country'] ?? 'Cargando...' }}</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-yellow-400 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-yellow-100 rounded-full mr-4">
                        <i class="fas fa-sun text-2xl text-yellow-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700">Clima Actual</h3>
                </div>
                <div class="text-gray-600">
                    <div class="flex justify-between items-end">
                        <span class="text-5xl font-extrabold text-gray-800">
                            {{ $weatherData['current_weather']['temperature'] ?? '--' }}°C
                        </span>
                        <div class="text-right text-sm">
                            <p>Viento: {{ $weatherData['current_weather']['windspeed'] ?? 0 }} km/h</p>
                        </div>
                    </div>
                    <p class="mt-4 text-xs text-gray-400">
                        Lat: {{ $geoData['lat'] ?? 0 }} | Lon: {{ $geoData['lon'] ?? 0 }}
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-500 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-green-100 rounded-full mr-4">
                        <i class="fas fa-money-bill-wave text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700">Dólar a Peso</h3>
                </div>
                <div class="text-gray-600 text-center py-2">
                    <p class="text-sm uppercase tracking-wide">Tipo de Cambio</p>
                    <p class="text-4xl font-extrabold text-green-600 mt-2">
                        ${{ $currencyData['rates']['MXN'] ?? '--' }} <span class="text-lg text-gray-500">MXN</span>
                    </p>
                    <p class="text-xs text-gray-400 mt-4">
                        Actualizado: {{ $currencyData['date'] ?? date('Y-m-d') }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection