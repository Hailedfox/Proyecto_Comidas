@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina', '- Usuarios')

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

<div class="container mx-auto pt-24 px-4 min-h-screen"> 
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white drop-shadow-md mb-4 md:mb-0">Usuarios Registrados</h2>

        <a href="{{ route('usuarios.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded-lg shadow-lg transition transform hover:-translate-y-1">
            <i class="fas fa-user-plus mr-2"></i> Agregar Usuario
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
        <table class="min-w-full leading-normal">
            <thead class="bg-gray-800 text-white text-sm uppercase">
                <tr>
                    <th class="p-4 text-left font-semibold tracking-wider">Foto</th>
                    <th class="p-4 text-left font-semibold tracking-wider">ID</th>
                    <th class="p-4 text-left font-semibold tracking-wider">Nombre</th>
                    <th class="p-4 text-left font-semibold tracking-wider">Email</th>
                    <th class="p-4 text-left font-semibold tracking-wider">Rol</th>
                    <th class="p-4 text-center font-semibold tracking-wider">Estado</th>
                    <th class="p-4 text-center font-semibold tracking-wider">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($usuarios as $u)
                <tr class="hover:bg-gray-50 transition text-sm">
                    <td class="p-4">
                        @if($u->foto)
                            <img src="{{ asset('storage/' . $u->foto) }}" class="h-10 w-10 rounded-full object-cover shadow">
                        @else
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 shadow">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    </td>
                    <td class="p-4 text-gray-500 font-bold">{{ $u->id }}</td>
                    <td class="p-4 font-semibold text-gray-800">{{ $u->name }}</td>
                    <td class="p-4 text-gray-600">{{ $u->email }}</td>
                    <td class="p-4">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-bold uppercase">
                            {{ $u->rol }}
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        @if($u->activo)
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold border border-green-200">Activo</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold border border-red-200">Inactivo</span>
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        <a href="{{ route('usuarios.edit', $u->id) }}" class="text-blue-500 hover:text-blue-700 mx-2 text-xl transition transform hover:scale-110" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        @if(Auth::check() && Auth::user()->esMaster())
                            <form action="{{ route('usuarios.destroy', $u->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar usuario definitivamente?')" class="text-red-500 hover:text-red-700 mx-2 text-xl transition transform hover:scale-110 bg-transparent border-none cursor-pointer" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-8 text-gray-500 bg-white">
                        No hay usuarios registrados en la base de datos.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection