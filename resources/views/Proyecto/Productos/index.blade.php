@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina', '- Inventario')

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

<div class="container mx-auto px-4 sm:px-8 pt-24 min-h-screen">
    <div class="py-8">
        
        <div class="flex justify-between items-center mb-6"> 
            <h2 class="text-3xl font-bold text-white drop-shadow-md">Inventario de Productos</h2>
            
            <a href="{{ route('productos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-150 ease-in-out">
                <i class="fas fa-plus mr-2"></i> Nuevo Producto
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

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-xl rounded-xl overflow-hidden bg-white">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                                Producto / ID
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                                Precios
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                                Stock
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                                Caducidad
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-xs font-semibold uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap font-bold text-base">
                                            {{ $producto->nombre }}
                                        </p>
                                        <p class="text-gray-500 whitespace-no-wrap text-xs mt-1">
                                            ID: {{ $producto->id_producto }} | Cat: {{ $producto->id_categoria }}
                                            </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-400 whitespace-no-wrap line-through text-xs">
                                    ${{ number_format($producto->precio_original, 2) }}
                                </p>
                                <p class="text-green-600 whitespace-no-wrap font-bold text-lg">
                                    ${{ number_format($producto->precio_descuento, 2) }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-medium">
                                    {{ $producto->cantidad_disponible }} un.
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ \Carbon\Carbon::parse($producto->fecha_caducidad)->format('d/m/Y') }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                @if($producto->activo)
                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full border border-green-300"></span>
                                        <span class="relative text-xs">Activo</span>
                                    </span>
                                @else
                                    <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden="true" class="absolute inset-0 bg-red-200 opacity-50 rounded-full border border-red-300"></span>
                                        <span class="relative text-xs">Inactivo</span>
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm text-center">
                                <div class="flex item-center justify-center space-x-4">
                                    
                                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="text-blue-500 hover:text-blue-700 transform hover:scale-110 transition text-lg" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    @if(Auth::guard('web')->user()->esMaster()) 
                                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas borrar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transform hover:scale-110 transition text-lg bg-transparent border-none cursor-pointer" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-5 py-8 border-b border-gray-200 bg-white text-base text-center text-gray-500 font-medium">
                                No hay productos registrados aún.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection