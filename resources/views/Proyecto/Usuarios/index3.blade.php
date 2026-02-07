@extends('/Proyecto/Nav2/nav')

@section('contenido')

<div class="container mx-auto pt-24">

<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Usuarios registrados</h2>

    <!-- BOTÓN AGREGAR USUARIO -->
    <a href="{{ route('usuarios.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
        Agregar Usuario
    </a>
</div>

<table class="min-w-full bg-white shadow rounded">

<thead class="bg-gray-200 text-sm uppercase">
<tr>
<th class="p-2">ID</th>
<th class="p-2">Nombre</th>
<th class="p-2">Email</th>
<th class="p-2">Teléfono</th>
<th class="p-2">Rol</th>
<th class="p-2">Estado</th>
<th class="p-2 text-center">Acciones</th>
</tr>
</thead>

<tbody>

@forelse($usuarios as $u)

<tr class="border-b text-sm">

<td class="p-2">{{ $u->id_usuario }}</td>
<td class="p-2 font-semibold">{{ $u->nombre }}</td>
<td class="p-2">{{ $u->email }}</td>
<td class="p-2">{{ $u->telefono }}</td>
<td class="p-2">{{ $u->rol }}</td>

<td class="p-2">
@if($u->activo)
<span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs">Activo</span>
@else
<span class="bg-red-200 text-red-800 px-2 py-1 rounded-full text-xs">Inactivo</span>
@endif
</td>

<td class="p-2 text-center">

<a href="{{ route('usuarios.edit',$u->id_usuario) }}" class="text-blue-500 mr-3">✏️</a>

<form action="{{ route('usuarios.destroy',$u->id_usuario) }}" method="POST" class="inline">
@csrf
@method('DELETE')

<button onclick="return confirm('¿Eliminar usuario?')" class="text-red-500">
🗑
</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="7" class="text-center p-6 text-gray-500">
No hay usuarios registrados
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

@endsection
