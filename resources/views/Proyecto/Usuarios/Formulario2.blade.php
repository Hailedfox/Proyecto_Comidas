@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina', isset($usuario) ? '- Editar Usuario' : '- Nuevo Usuario')

@section('contenido')

<style>
    .fondo-ondas-animado {
        background: linear-gradient(-45deg, #152a5b, #2e89a5, #13599b, #fc6a95);
        background-size: 400% 400%;
        animation: gradientMovement 10s ease infinite;
        mix-blend-mode: overlay; 
        opacity: 0.85; 
    }
    @keyframes gradientMovement {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<div class="relative min-h-screen flex items-center justify-center pt-24 px-4 bg-gray-900 bg-cover bg-center bg-no-repeat"
     style="background-image: url('{{ asset('img/alimentosFondo.jpg') }}');">

    <div class="absolute inset-0 fondo-ondas-animado"></div>

    <div class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-2xl p-8 my-8">

        <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 text-center mb-6">
            {{ isset($usuario) ? 'Editar Usuario' : 'Registrar Nuevo Usuario' }}
        </h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" enctype="multipart/form-data" 
              action="{{ isset($usuario) ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}" 
              class="space-y-5">
            @csrf
            @if (isset($usuario))
                @method('PUT')
            @endif

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Nombre Completo *</label>
                <input type="text" name="nombre" required value="{{ old('nombre', $usuario->name ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico *</label>
                <input type="email" name="email" required value="{{ old('email', $usuario->email ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
            </div>

            @if (!isset($usuario))
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Contraseña *</label>
                    <input type="password" name="password" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                    <p class="mt-1 text-xs text-gray-500">Se guardará de forma segura (encriptada).</p>
                </div>
            @else
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nueva Contraseña (Opcional)</label>
                    <input type="password" name="password" placeholder="Deja en blanco para no cambiarla"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                </div>
            @endif

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Rol en el sistema *</label>
                    <select name="rol" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                        <option value="">Seleccione</option>
                        <option value="base" {{ old('rol', $usuario->rol ?? '') == 'base' ? 'selected' : '' }}>Usuario Base</option>
                        <option value="comercio" {{ old('rol', $usuario->rol ?? '') == 'comercio' ? 'selected' : '' }}>Dueño Comercio</option>
                        <option value="master" {{ old('rol', $usuario->rol ?? '') == 'master' ? 'selected' : '' }}>Admin Master</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Foto de perfil</label>
                @if (isset($usuario) && $usuario->foto)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $usuario->foto) }}" class="w-16 h-16 rounded-full object-cover shadow border">
                    </div>
                @endif
                <input type="file" name="foto" accept="image/*"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2">
            </div>

            <div class="flex items-center pt-2">
                <input id="activo" name="activo" type="checkbox" value="1"
                    {{ old('activo', $usuario->activo ?? true) ? 'checked' : '' }}
                    class="w-4 h-4 border border-gray-300 rounded text-blue-600 focus:ring-blue-500">
                <label for="activo" class="ml-2 text-sm font-medium text-gray-900">Usuario activo (Permitir acceso)</label>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('usuarios.index') }}"
                    class="w-1/2 text-center text-gray-700 bg-gray-200 hover:bg-gray-300 font-bold rounded-lg text-sm px-5 py-3 transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="w-1/2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-3 transition shadow-lg">
                    <i class="fas fa-save mr-1"></i> {{ isset($usuario) ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection