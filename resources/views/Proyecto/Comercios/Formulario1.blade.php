@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', 'Registrar comercio')

@section('contenido')

    <section class="bg-gray-50 dark:bg-gray-900 pt-28">

        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">

            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg">
                Mordida de flujo
            </a>

            <div
                class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">

                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Registrar comercio
                    </h1>

                    <form method="POST" action="/comercios" class="space-y-4 md:space-y-6">

                        @csrf
                        <input type="hidden" name="id_usuario" value="1">

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input name="nombre" required
                                class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <textarea name="descripcion"
                                class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white"></textarea>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                            <input name="direccion"
                                class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ciudad</label>
                            <input name="ciudad"
                                class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apertura</label>
                                <input type="time" name="horario_apertura"
                                    class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cierre</label>
                                <input type="time" name="horario_cierre"
                                    class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                            </div>
                        </div>

                        <div class="flex items-center gap-2 text-gray-500 dark:text-gray-300">
                            <input type="checkbox" name="activo" value="1" checked>
                            <span>Comercio activo</span>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 rounded-lg text-sm px-5 py-2.5">
                            Guardar comercio
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </section>

@endsection
