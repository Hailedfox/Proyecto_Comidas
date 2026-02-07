@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', '- Registrar comercio')

@section('contenido')

    <div class="min-h-screen flex items-center justify-center pt-20 px-4 bg-gray-800 bg-blend-overlay bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('img/comerciosFondo.jpg') }}');">

        <div class="w-full max-w-md bg-white rounded-lg shadow-lg dark:border dark:bg-gray-800 dark:border-gray-700 p-8">

            <h1
                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center mb-6">
                {{ isset($comercio) ? 'Editar comercio' : 'Registrar comercio' }}
            </h1>

            <form method="POST"
                action="{{ isset($comercio) ? route('comercios.update', $comercio->id_comercio) : route('comercios.store') }}"
                class="space-y-4 md:space-y-5">

                @csrf
                @if (isset($comercio))
                    @method('PUT')
                @endif

                <input type="hidden" name="id_usuario" value="{{ old('id_usuario', $comercio->id_usuario ?? 1) }}">

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del comercio
                        *</label>
                    <input type="text" name="nombre" required value="{{ old('nombre', $comercio->nombre ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                    <textarea name="descripcion" rows="2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('descripcion', $comercio->descripcion ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                    <input type="text" name="direccion" value="{{ old('direccion', $comercio->direccion ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ciudad</label>
                    <input type="text" name="ciudad" value="{{ old('ciudad', $comercio->ciudad ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apertura</label>
                        <input type="time" name="horario_apertura"
                            value="{{ old('horario_apertura', $comercio->horario_apertura ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cierre</label>
                        <input type="time" name="horario_cierre"
                            value="{{ old('horario_cierre', $comercio->horario_cierre ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="activo" name="activo" type="checkbox" value="1"
                        {{ old('activo', $comercio->activo ?? true) ? 'checked' : '' }}
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50">

                    <label for="activo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Comercio activo
                    </label>
                </div>

                <button type="submit"
                    class="w-full text-white bg-purple-900 hover:bg-purple-800 font-medium rounded-lg text-sm px-5 py-2.5">

                    {{ isset($comercio) ? 'Actualizar comercio' : 'Guardar comercio' }}

                </button>

            </form>

        </div>
    </div>

@endsection
