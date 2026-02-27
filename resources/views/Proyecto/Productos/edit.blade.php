@extends('Proyecto.Nav2.Nav')

@section('titulo-pagina', '- Editar Producto')

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
     style="background-image: url('https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1974&auto=format&fit=crop');">
    
    <div class="absolute inset-0 fondo-ondas-animado"></div>

    <div class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-2xl p-8 my-8 border border-gray-100">

        <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 text-center mb-6">
            Editar Producto
        </h1>
        
        <form method="POST" action="{{ route('productos.update', $producto->id_producto) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Comercio Perteneciente *</label>
                <select name="id_comercio" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                    <option value="">Seleccione un comercio...</option>
                    <option value="1" {{ $producto->id_comercio == 1 ? 'selected' : '' }}>Comercio Demo (ID 1)</option>
                    <option value="2" {{ $producto->id_comercio == 2 ? 'selected' : '' }}>Panadería San José (ID 2)</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Categoría</label>
                <select name="id_categoria"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                    <option value="1" {{ $producto->id_categoria == 1 ? 'selected' : '' }}>Alimentos Preparados</option>
                    <option value="2" {{ $producto->id_categoria == 2 ? 'selected' : '' }}>Abarrotes</option>
                    <option value="3" {{ $producto->id_categoria == 3 ? 'selected' : '' }}>Frutas y Verduras</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Nombre del producto *</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                <textarea name="descripcion" rows="2" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">{{ $producto->descripcion }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Precio Original ($) *</label>
                    <input type="number" step="0.01" name="precio_original" value="{{ $producto->precio_original }}" required 
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 text-green-600">Precio Oferta ($) *</label>
                    <input type="number" step="0.01" name="precio_descuento" value="{{ $producto->precio_descuento }}" required 
                        class="bg-gray-50 border border-green-400 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Stock (Unidades) *</label>
                    <input type="number" name="cantidad_disponible" value="{{ $producto->cantidad_disponible }}" required 
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 text-red-600">Fecha de Caducidad *</label>
                    <input type="date" name="fecha_caducidad" value="{{ \Carbon\Carbon::parse($producto->fecha_caducidad)->format('Y-m-d') }}" required
                        class="bg-gray-50 border border-red-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Hora Inicio Recogida</label>
                    <input type="time" name="hora_recogida_inicio" value="{{ $producto->hora_recogida_inicio }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Hora Fin Recogida</label>
                    <input type="time" name="hora_recogida_fin" value="{{ $producto->hora_recogida_fin }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                </div>
            </div>

            <div class="flex items-center pt-2">
                <input id="activo" name="activo" type="checkbox" value="1" {{ $producto->activo ? 'checked' : '' }}
                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 text-blue-600">
                <label for="activo" class="ml-2 text-sm font-medium text-gray-900">Producto visible en tienda</label>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('productos.index') }}"
                    class="w-1/2 text-center text-gray-700 bg-gray-200 hover:bg-gray-300 font-bold rounded-lg text-sm px-5 py-3 transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="w-1/2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-3 text-center transition shadow-lg">
                    <i class="fas fa-save mr-1"></i> Actualizar
                </button>
            </div>

        </form>
    </div>
</div>

@endsection