@extends('/Proyecto/Bienvenida')

@section('titulo-pagina', 'registroProductos')

@section('contenido')


<form action="/ruta-de-tu-servidor" method="POST">

    <div class="form-group">
        <label for="id_comercio">Comercio:</label>
        <select id="id_comercio" name="id_comercio" required>
            <option value="">Seleccione un comercio...</option>
            <option value="1">Comercio Ejemplo 1</option>
        </select>
    </div>

    <div class="form-group">
        <label for="id_categoria">Categoría:</label>
        <select id="id_categoria" name="id_categoria">
            <option value="">Sin categoría</option>
            <option value="1">Alimentos</option>
            <option value="2">Bebidas</option>
        </select>
    </div>

    <div class="form-group">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required maxlength="255">
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label for="precio_original">Precio Original ($):</label>
        <input type="number" id="precio_original" name="precio_original" step="0.01" min="0" required>
    </div>

    <div class="form-group">
        <label for="precio_descuento">Precio con Descuento ($):</label>
        <input type="number" id="precio_descuento" name="precio_descuento" step="0.01" min="0" required>
    </div>

    <div class="form-group">
        <label for="cantidad_disponible">Cantidad Disponible:</label>
        <input type="number" id="cantidad_disponible" name="cantidad_disponible" min="0" required>
    </div>

    <div class="form-group">
        <label for="fecha_caducidad">Fecha de Caducidad:</label>
        <input type="date" id="fecha_caducidad" name="fecha_caducidad" required>
    </div>

    <div class="form-group">
        <label for="hora_recogida_inicio">Hora de Recogida (Inicio):</label>
        <input type="time" id="hora_recogida_inicio" name="hora_recogida_inicio">
    </div>

    <div class="form-group">
        <label for="hora_recogida_fin">Hora de Recogida (Fin):</label>
        <input type="time" id="hora_recogida_fin" name="hora_recogida_fin">
    </div>

    <div class="form-group" style="display: flex; align-items: center;">
        <input type="checkbox" id="activo" name="activo" value="1" checked style="width: auto; margin-right: 10px;">
        <label for="activo" style="margin-bottom: 0;">Producto Activo</label>
    </div>

    <button type="submit">Guardar Producto</button>

</form
@endsection