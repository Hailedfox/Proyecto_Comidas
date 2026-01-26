@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', 'registro')

@section('contenido')

<form action="/guardar_usuario" method="POST">

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Completo *</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej. Juan Pérez" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico *</label>
                <input type="email" id="email" name="email" required placeholder="usuario@ejemplo.com" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña *</label>
                <input type="password" id="password" name="password" required placeholder="********" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs text-gray-500 mt-1">La contraseña será encriptada al guardar.</p>
            </div>

            <div class="mb-4">
                <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="(555) 123-4567" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="rol" class="block text-gray-700 text-sm font-bold mb-2">Rol de Usuario *</label>
                <select id="rol" name="rol" required 
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="" disabled selected>Selecciona un rol</option>
                    <option value="cliente">Cliente</option>
                    <option value="comercio">Comercio</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" id="activo" name="activo" value="1" checked 
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="activo" class="ml-2 text-sm font-medium text-gray-900">Usuario activo</label>
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Registrar Usuario
                </button>
            </div>

        </form>

@endsection