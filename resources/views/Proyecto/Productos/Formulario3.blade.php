@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', '- Registrar producto')

@section('contenido')



<section class="bg-gray-50 dark:bg-gray-900 pt-28">

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">

        <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">

            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Registrar producto
                </h1>

                <form method="POST" action="/guardar_producto.php" class="space-y-4 md:space-y-6">

                    @csrf

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comercio *</label>
                        <select name="id_comercio" required
                            class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                            <option value="">Seleccione...</option>
                            <option value="1">Comercio Demo</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                        <select name="id_categoria"
                            class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                            <option value="">Sin categoría</option>
                            <option value="1">Alimentos</option>
                            <option value="2">Higiene</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del producto *</label>
                        <input name="nombre" required
                            class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                        </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                        <textarea name="descripcion"
                            class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white"></textarea>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio original *</label>
                        <input type="number" name="precio_original" required
                            class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio oferta *</label>
                        <input type="number" name="precio_descuento" required
                            class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock *</label>
                        <input type="number" name="cantidad_disponible" required
                            class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha caducidad *</label>
                        <input type="date" name="fecha_caducidad" required
                            class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Inicio recogida</label>
                            <input type="time" name="hora_recogida_inicio"
                                class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fin recogida</label>
                            <input type="time" name="hora_recogida_fin"
                                class="bg-gray-50 border border-gray-300 rounded-lg w-full p-2.5 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-gray-500 dark:text-gray-300">
                        <input type="checkbox" name="activo" value="1" checked>
                        <span>Producto activo</span>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 rounded-lg text-sm px-5 py-2.5">
                        Guardar producto
                    </button>

                </form>

            </div>
        </div>

    </div>
</section>

@endsection
