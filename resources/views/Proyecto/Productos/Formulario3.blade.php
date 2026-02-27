@extends('Proyecto.Nav2.Nav')

@section('contenido')
<div class="relative min-h-screen flex items-center justify-center pt-24 px-4 bg-gray-900 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1974&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-black opacity-60"></div>

    <div class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-2xl p-8 my-8">
        <h1 class="text-2xl font-bold text-center text-gray-900 mb-6">Registrar Nuevo Producto</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('productos.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Comercio Perteneciente *</label>
                <select name="id_comercio" required class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                    <option value="">Seleccione un comercio...</option>
                    {{-- CARGA DINÁMICA: Aquí aparecen los comercios que agregaste --}}
                    @foreach($comercios as $comercio)
                        <option value="{{ $comercio->id_comercio }}" {{ old('id_comercio') == $comercio->id_comercio ? 'selected' : '' }}>
                            {{ $comercio->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Nombre del producto *</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                <textarea name="descripcion" rows="2" class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">{{ old('descripcion') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Precio Original *</label>
                    <input type="number" step="0.01" name="precio_original" value="{{ old('precio_original') }}" required class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-green-600">Precio Oferta *</label>
                    <input type="number" step="0.01" name="precio_descuento" value="{{ old('precio_descuento') }}" required class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Stock *</label>
                    <input type="number" name="cantidad_disponible" value="{{ old('cantidad_disponible') }}" required class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-red-600">Fecha de Caducidad *</label>
                    <input type="date" name="fecha_caducidad" value="{{ old('fecha_caducidad') }}" required class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5">
                </div>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('productos.index') }}" class="w-1/2 text-center bg-gray-200 py-3 rounded-lg font-bold">Cancelar</a>
                <button type="submit" class="w-1/2 text-white bg-blue-600 py-3 rounded-lg font-bold shadow-lg">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection