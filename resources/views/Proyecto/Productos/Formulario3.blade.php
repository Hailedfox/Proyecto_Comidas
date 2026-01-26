@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', 'registroProductos')

@section('contenido')


<form action="/guardar_producto.php" method="POST">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="id_comercio" class="block text-gray-700 text-sm font-bold mb-2">Comercio *</label>
                    <select id="id_comercio" name="id_comercio" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Seleccione...</option>
                        <option value="1">Comercio Demo</option>
                    </select>
                </div>
                <div>
                    <label for="id_categoria" class="block text-gray-700 text-sm font-bold mb-2">Categoría</label>
                    <select id="id_categoria" name="id_categoria" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sin categoría</option>
                        <option value="1">Alimentos</option>
                        <option value="2">Higiene</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto *</label>
                <input type="text" id="nombre" name="nombre" required maxlength="255" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="precio_original" class="block text-gray-700 text-sm font-bold mb-2">Precio Original ($) *</label>
                    <input type="number" id="precio_original" name="precio_original" step="0.01" min="0" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="precio_descuento" class="block text-gray-700 text-sm font-bold mb-2">Precio Oferta ($) *</label>
                    <input type="number" id="precio_descuento" name="precio_descuento" step="0.01" min="0" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="cantidad_disponible" class="block text-gray-700 text-sm font-bold mb-2">Stock Disponible *</label>
                    <input type="number" id="cantidad_disponible" name="cantidad_disponible" min="0" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mb-4">
                <label for="fecha_caducidad" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Caducidad *</label>
                <input type="date" id="fecha_caducidad" name="fecha_caducidad" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="hora_recogida_inicio" class="block text-gray-700 text-sm font-bold mb-2">Hora Inicio Recogida</label>
                    <input type="time" id="hora_recogida_inicio" name="hora_recogida_inicio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="hora_recogida_fin" class="block text-gray-700 text-sm font-bold mb-2">Hora Fin Recogida</label>
                    <input type="time" id="hora_recogida_fin" name="hora_recogida_fin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" id="activo" name="activo" value="1" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="activo" class="ml-2 text-sm font-medium text-gray-900">Producto activo y visible al público</label>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Guardar Producto
                </button>
            </div>

        </form>
@endsection