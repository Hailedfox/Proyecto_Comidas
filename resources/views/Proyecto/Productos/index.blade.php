@extends('Proyecto.Bienvenida')

@section('titulo-pagina', '- Inventario')

@section('contenido')

    <div class="bg-gray-100 font-sans leading-normal tracking-normal min-h-screen pt-24">

        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                
                <div class="flex justify-between items-center mb-6"> 
                    <h2 class="text-2xl font-semibold leading-tight text-gray-800">Inventario de Productos</h2>
                    
                    <a href="{{ route('productos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition duration-150 ease-in-out">
                        <i class="fas fa-plus mr-2"></i> Nuevo Producto
                    </a>
                </div>

                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Producto / ID
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Precios
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Stock
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Caducidad
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Estado
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productos as $producto)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap font-bold">
                                                    {{ $producto->nombre }}
                                                </p>
                                                <p class="text-gray-600 whitespace-no-wrap text-xs">
                                                    ID: {{ $producto->id_producto }} | Cat: {{ $producto->id_categoria }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap line-through text-xs text-red-400">
                                            ${{ number_format($producto->precio_original, 2) }}
                                        </p>
                                        <p class="text-green-600 whitespace-no-wrap font-bold">
                                            ${{ number_format($producto->precio_descuento, 2) }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $producto->cantidad_disponible }} un.
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $producto->fecha_caducidad }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if($producto->activo == 1)
                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Activo</span>
                                            </span>
                                        @else
                                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden="true" class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Inactivo</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <div class="flex item-center justify-center">
                                            <a href="#" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="#" method="POST" onsubmit="return confirm('¿Borrar?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 border-none bg-transparent cursor-pointer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-500">
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
    </div>

@endsection