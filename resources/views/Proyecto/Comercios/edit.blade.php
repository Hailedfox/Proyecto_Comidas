@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina', '- Editar Comercio')

@section('contenido')

<style>
    .fondo-ondas-animado {
        background: linear-gradient(-45deg, #152a5b, #2e89a5, #13599b, #fc6a95);
        background-size: 600% 600%;
        animation: gradientMovement 10s ease infinite;
    }

    @keyframes gradientMovement {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<div class="min-h-screen flex items-center justify-center pt-24 px-4 bg-gray-100 fondo-ondas-animado">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-lg p-8">
        
        <h1 class="text-2xl font-bold text-center text-gray-900 mb-6">Editar Comercio</h1>

        <form method="POST" action="{{ route('comercios.update', $comercio->id_comercio) }}" class="space-y-4">
            @csrf
            @method('PUT') <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Nombre del Comercio</label>
                <input type="text" name="nombre" value="{{ $comercio->nombre }}" required 
                    class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                <textarea name="descripcion" rows="2" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">{{ $comercio->descripcion }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Ciudad</label>
                    <input type="text" name="ciudad" value="{{ $comercio->ciudad }}" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Dirección</label>
                    <input type="text" name="direccion" value="{{ $comercio->direccion }}" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Apertura</label>
                    <input type="time" name="horario_apertura" value="{{ $comercio->horario_apertura }}" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Cierre</label>
                    <input type="time" name="horario_cierre" value="{{ $comercio->horario_cierre }}" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                </div>
            </div>

            <div class="flex items-center">
                <input id="activo" name="activo" type="checkbox" value="1" {{ $comercio->activo == 1 ? 'checked' : '' }} class="w-4 h-4 border-gray-300 rounded">
                <label for="activo" class="ml-2 text-sm font-medium text-gray-900">Activo</label>
            </div>

            <div class="flex gap-4 pt-2">
                <a href="{{ route('comercios.index') }}" class="w-1/2 text-center text-gray-700 bg-gray-200 hover:bg-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">Cancelar</a>
                <button type="submit" class="w-1/2 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Actualizar</button>
            </div>

        </form>
    </div>
</div>

@endsection