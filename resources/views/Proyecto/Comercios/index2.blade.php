@extends('/Proyecto/Nav2/nav')

@section('contenido')
    <div class="container mx-auto pt-24">

        <h2 class="text-2xl font-bold mb-4">Lista de Comercios</h2>

        <a href="{{ route('comercios.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Nuevo Comercio
        </a>

        <table class="min-w-full mt-6 bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-200 text-sm uppercase">
                    <th class="p-2">ID</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Ciudad</th>
                    <th class="p-2">Horario</th>
                    <th class="p-2">Estado</th>
                    <th class="p-2 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @forelse($comercios as $c)
                    <tr class="border-b text-sm">

                        <td class="p-2">{{ $c->id_comercio }}</td>
                        <td class="p-2 font-semibold">{{ $c->nombre }}</td>
                        <td class="p-2">{{ $c->ciudad }}</td>

                        <td class="p-2">
                            {{ $c->horario_apertura }} - {{ $c->horario_cierre }}
                        </td>

                        <td class="p-2">
                            @if ($c->activo)
                                <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs">Activo</span>
                            @else
                                <span class="bg-red-200 text-red-800 px-2 py-1 rounded-full text-xs">Inactivo</span>
                            @endif
                        </td>

                        <td class="p-2 text-center">

                            <a href="{{ route('comercios.edit', $c->id_comercio) }}"
                                class="text-blue-500 hover:text-blue-700 mr-3">
                                ✏️
                            </a>

                            <form action="{{ route('comercios.destroy', $c->id_comercio) }}" method="POST" class="inline">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('¿Eliminar comercio?')"
                                    class="text-red-500 hover:text-red-700">
                                    🗑
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center p-6 text-gray-500">
                            No hay comercios registrados
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    </div>
@endsection
