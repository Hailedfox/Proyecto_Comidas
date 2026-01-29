@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', 'Bienvenida')

@section('contenido')

<style>
    /* Estilo para la animación del fondo */
    .fondo-ondas-animado {
        background: linear-gradient(-45deg, #0f172a, #312e81, #ce6591, #4c1d95);
        background-size: 400% 400%;
        animation: gradientMovement 10s ease infinite;
    }

    @keyframes gradientMovement {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<section class="min-h-screen flex flex-col items-center justify-center pt-20 fondo-ondas-animado px-4 text-center">

    <img src="{{ asset('img/CelerisLogo.png') }}" 
         alt="Logo Celeris" 
         class="w-32 md:w-48 h-auto mb-6 drop-shadow-2xl">

    <div class="max-w-3xl mx-auto">

        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight">
            Bienvenido a <span class="text-pink-500">Celeris</span>
        </h1>

        <p class="text-gray-200 text-lg md:text-xl mb-6 leading-relaxed">
            <span class="font-semibold text-white">Celeris</span> es una plataforma diseñada para ayudarte a gestionar tus comercios de forma rápida, clara y segura.
            Registra tu negocio, administra tu información y mantén todo organizado desde un solo lugar.
        </p>

        <p class="text-white text-sm md:text-base max-w-2xl mx-auto mb-10">
            Nuestro objetivo es brindarte una experiencia sencilla e intuitiva, combinando tecnología y diseño para
            facilitar tu día a día.
        </p>

        <a href="{{ url('/Usuarios') }}" class="inline-block px-8 py-3 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-full shadow-lg transition transform hover:-translate-y-1">
            Comenzar
        </a>

    </div>

</section>

@endsection