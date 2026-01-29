@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', '- Registrar usuario')

@section('contenido')

<div class="min-h-screen flex items-center justify-center pt-20 px-4 bg-gray-800 bg-blend-overlay bg-cover bg-center bg-no-repeat"
     style="background-image: url('{{ asset('img/alimentosFondo.jpg') }}');">
     
   
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg dark:border dark:bg-gray-800 dark:border-gray-700 p-8">

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center mb-6">
            Registrar usuario
        </h1>

        <form method="POST" action="/guardar_usuario" class="space-y-4 md:space-y-5">
            @csrf

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre *</label>
                <input type="text" name="nombre" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo *</label>
                <input type="email" name="email" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña *</label>
                <input type="password" name="password_hash" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <p class="mt-1 text-xs text-gray-500">Se guardará encriptada</p>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                <input type="text" name="telefono"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol *</label>
                <select name="rol" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="">Seleccione</option>
                    <option value="cliente">Cliente</option>
                    <option value="comercio">Comercio</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <div class="flex items-center">
                <input id="activo" name="activo" type="checkbox" value="1" checked
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600">
                <label for="activo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Usuario activo</label>
            </div>

            <button type="submit"
                class="w-full text-white bg-purple-900 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Guardar usuario
            </button>

        </form>
    </div>
</div>

@endsection 