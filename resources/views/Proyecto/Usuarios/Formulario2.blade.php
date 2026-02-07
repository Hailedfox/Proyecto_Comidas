@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', '- Registrar usuario')

@section('contenido')

    <div class="min-h-screen flex items-center justify-center pt-20 px-4 bg-gray-800 bg-blend-overlay bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('img/alimentosFondo.jpg') }}');">

        <div class="w-full max-w-md bg-white rounded-lg shadow-lg dark:border dark:bg-gray-800 dark:border-gray-700 p-8">

            <h1
                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center mb-6">
                {{ isset($usuario) ? 'Editar usuario' : 'Registrar usuario' }}
            </h1>

            @if ($errors->any())
                <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-200 border border-green-500 text-green-800 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST"
                action="{{ isset($usuario) ? route('usuarios.update', $usuario->id_usuario) : route('usuarios.store') }}"
                class="space-y-4 md:space-y-5">

                @csrf
                @if (isset($usuario))
                    @method('PUT')
                @endif

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre *</label>
                    <input type="text" name="nombre" required value="{{ old('nombre', $usuario->nombre ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo *</label>
                    <input type="email" name="email" required value="{{ old('email', $usuario->email ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                @if (!isset($usuario))
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña *</label>
                        <input type="password" name="password" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <p class="mt-1 text-xs text-gray-500">Se guardará encriptada</p>
                    </div>
                @endif

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol *</label>
                    <select name="rol" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option value="">Seleccione</option>
                        <option value="cliente" {{ old('rol', $usuario->rol ?? '') == 'cliente' ? 'selected' : '' }}>Cliente
                        </option>
                        <option value="comercio" {{ old('rol', $usuario->rol ?? '') == 'comercio' ? 'selected' : '' }}>Comercio
                        </option>
                        <option value="admin" {{ old('rol', $usuario->rol ?? '') == 'admin' ? 'selected' : '' }}>Administrador
                        </option>

                    </select>
                </div>

                <div class="flex items-center">
                    <input id="activo" name="activo" type="checkbox" value="1"
                        {{ old('activo', $usuario->activo ?? true) ? 'checked' : '' }}
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50">

                    <label for="activo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Usuario activo
                    </label>
                </div>

                <button type="submit"
                    class="w-full text-white bg-purple-900 hover:bg-purple-800 font-medium rounded-lg text-sm px-5 py-2.5">

                    {{ isset($usuario) ? 'Actualizar usuario' : 'Guardar usuario' }}

                </button>

            </form>

            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-4">
                ¿Ya tienes cuenta?
                <a href="/Sesion" class="text-purple-700 hover:underline font-medium">
                    Iniciar sesión
                </a>
            </p>

        </div>
    </div>

@endsection
