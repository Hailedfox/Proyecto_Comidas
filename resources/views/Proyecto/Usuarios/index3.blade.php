@extends('/Proyecto/Nav2/nav')

@section('contenido')

<style>
    .fondo-ondas-animado {
        background: linear-gradient(-45deg, #152a5b, #2e89a5, #13599b, #fc6a95);
        background-size: 400% 400%; /* 600% a veces es muy grande, 400% se ve mejor */
        animation: gradientMovement 10s ease infinite;
    }

    @keyframes gradientMovement {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<div class="fixed inset-0 -z-10 fondo-ondas-animado"></div>


<div class="container mx-auto pt-24"> <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-white drop-shadow-md">Usuarios registrados</h2>

        <a href="{{ route('usuarios.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Agregar Usuario
        </a>
    </div>

    <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gray-200 text-sm uppercase">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Email</th>
                <th class="p-3">Teléfono</th>
                <th class="p-3">Rol</th>
                <th class="p-3">Estado</th>
                <th class="p-3 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($usuarios as $u)
            <tr class="border-b text-sm hover:bg-gray-50">
                <td class="p-3">{{ $u->id_usuario }}</td>
                <td class="p-3 font-semibold">{{ $u->nombre }}</td>
                <td class="p-3">{{ $u->email }}</td>
                <td class="p-3">{{ $u->telefono }}</td>
                <td class="p-3">{{ $u->rol }}</td>
                <td class="p-3">
                    @if($u->activo)
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-bold border border-green-200">Activo</span>
                    @else
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-bold border border-red-200">Inactivo</span>
                    @endif
                </td>
                <td class="p-3 text-center">
                    <a href="{{ route('usuarios.edit',$u->id_usuario) }}" class="text-blue-500 hover:text-blue-700 mr-3 text-lg" title="Editar">✏️</a>
                    
                    <form action="{{ route('usuarios.destroy',$u->id_usuario) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Eliminar usuario?')" class="text-red-500 hover:text-red-700 text-lg" title="Eliminar">
                            🗑
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center p-6 text-gray-500 bg-white">
                    No hay usuarios registrados
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection