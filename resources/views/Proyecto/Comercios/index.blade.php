@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina', '- Comercios')

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

    <div class="bg-gray-100 font-sans leading-normal tracking-normal min-h-screen pt-24 fondo-ondas-animado">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold leading-tight text-white">Listado de Comercios</h2>
                    <a href="{{ route('comercios.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition duration-150 ease-in-out">
                        <i class="fas fa-plus mr-2"></i> Nuevo Comercio
                    </a>
                </div>

                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ubicación</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Horario</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($comercios as $comercio)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap font-bold">{{ $comercio->nombre }}</p>
                                                <p class="text-gray-600 whitespace-no-wrap text-xs">ID: {{ $comercio->id_comercio }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $comercio->ciudad }}</p>
                                        <p class="text-gray-600 text-xs">{{ $comercio->direccion }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $comercio->horario_apertura }} - {{ $comercio->horario_cierre }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <div class="flex item-center justify-center space-x-4">
                                            <a href="{{ route('comercios.edit', $comercio->id_comercio) }}" class="text-purple-600 hover:text-purple-900 transform hover:scale-110">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('comercios.destroy', $comercio->id_comercio) }}" method="POST" onsubmit="return confirm('¿Borrar este comercio?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 border-none bg-transparent cursor-pointer transform hover:scale-110">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-500">No hay comercios registrados.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection