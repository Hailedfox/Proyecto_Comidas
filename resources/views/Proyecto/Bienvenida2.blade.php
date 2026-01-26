@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', 'Bienvenida')

@section('contenido')
    <section class="pt-32 min-h-screen bg-gray-50 dark:bg-gray-900 flex items-center">

        <div class="max-w-4xl mx-auto text-center px-6">

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                Bienvenido a <span class="text-primary-600">Rappy</span>
            </h1>

            <p class="text-gray-600 dark:text-gray-300 text-lg mb-6">
                Rappy es una plataforma diseñada para ayudarte a gestionar tus comercios de forma rápida, clara y
                segura.
                Registra tu negocio, administra tu información y mantén todo organizado desde un solo lugar.
            </p>

            <p class="text-gray-500 dark:text-gray-400 mb-10">
                Nuestro objetivo es brindarte una experiencia sencilla e intuitiva, combinando tecnología y diseño para
                facilitar tu día a día.
            </p>

            

        </div>

    </section>

@endsection
