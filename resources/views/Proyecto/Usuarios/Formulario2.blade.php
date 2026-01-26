@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', 'Registrar usuario')

@section('contenido')

<div class="flex flex-col items-center justify-center px-6 py-20 mx-auto bg-gray-50 dark:bg-gray-900 min-h-screen">

    <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">

        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Registrar usuario
            </h1>

            <form method="POST" action="/guardar_usuario" class="space-y-4 md:space-y-6">

                @csrf

                <!-- Nombre -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre *</label>
                    <input name="nombre" required
                        class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Email -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo *</label>
                    <input type="email" name="email" required
                        class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Password -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña *</label>
                    <input type="password" name="password_hash" required
                        class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                    <p class="text-xs text-gray-500">Se guardará encriptada</p>
                </div>

                <!-- Teléfono -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                    <input name="telefono"
                        class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Rol -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol *</label>
                    <select name="rol" required
                        class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                        <option value="">Seleccione</option>
                        <option value="cliente">Cliente</option>
                        <option value="comercio">Comercio</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                <!-- Activo -->
                <div class="flex items-center gap-2 text-gray-500 dark:text-gray-300">
                    <input type="checkbox" name="activo" value="1" checked>
                    <span>Usuario activo</span>
                </div>

                <button type="submit"
                    class="w-full text-white bg-primary-600 hover:bg-primary-700 rounded-lg text-sm px-5 py-2.5">
                    Guardar usuario
                </button>

            </form>

        </div>
    </div>
</div>

@endsection
