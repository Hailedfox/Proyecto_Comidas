@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina', '- Comercios')

@section('contenido')

<style>
    .fondo-ondas-animado {
        background: linear-gradient(-45deg, #152a5b, #2e89a5, #13599b, #fc6a95);
        background-size: 400% 400%;
        animation: gradientMovement 10s ease infinite;
    }
    @keyframes gradientMovement {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<div class="fixed inset-0 -z-10 fondo-ondas-animado"></div>

<div class="container mx-auto pt-24 px-4"> 
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white drop-shadow-md mb-4 md:mb-0">Gestión de Comercios</h2>
        
        <a href="{{ route('comercios.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded-lg shadow-lg transition transform hover:-translate-y-1">
            <i class="fas fa-plus mr-2"></i> Nuevo Comercio
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-xl overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-800 text-white text-sm uppercase">
                <tr>
                    <th class="p-4 text-left">Foto</th>
                    <th class="p-4 text-left">Nombre</th>
                    <th class="p-4 text-left">Dueño</th>
                    <th class="p-4 text-left">Ubicación</th>
                    <th class="p-4 text-left">Horario</th>
                    <th class="p-4 text-center">Estado</th>
                    <th class="p-4 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($comercios as $c)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">
                        @if($c->foto)
                            <img src="{{ asset('storage/' . $c->foto) }}" alt="{{ $c->nombre }}" class="h-12 w-12 rounded-full object-cover shadow">
                        @else
                            <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center shadow">
                                <i class="fas fa-store text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="p-4 font-bold text-gray-800">{{ $c->nombre }}</td>
                    <td class="p-4 text-gray-600">{{ $c->usuario ? $c->usuario->name : 'Sin asignar' }}</td>
                    <td class="p-4 text-gray-600">{{ $c->ciudad }}</td>
                    <td class="p-4 text-gray-600 text-sm">
                        {{ \Carbon\Carbon::parse($c->horario_apertura)->format('H:i') }} - 
                        {{ \Carbon\Carbon::parse($c->horario_cierre)->format('H:i') }}
                    </td>
                    <td class="p-4 text-center">
                        @if($c->activo)
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold border border-green-200">Activo</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold border border-red-200">Inactivo</span>
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        <a href="{{ route('comercios.edit', $c->id_comercio) }}" class="text-blue-500 hover:text-blue-700 mx-2 text-xl" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        @if(Auth::check() && Auth::user()->esMaster())
                            <form action="{{ route('comercios.destroy', $c->id_comercio) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este comercio?')" class="text-red-500 hover:text-red-700 mx-2 text-xl" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-8 text-gray-500 font-medium">
                        No hay comercios registrados en el sistema.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection