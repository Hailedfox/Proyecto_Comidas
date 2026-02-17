<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comercio; // Asegúrate de que este modelo exista

class ComercioController extends Controller
{
    // --- 1. VER LISTA (Index) ---
    public function index()
    {
        $comercios = Comercio::all();
        // Asegúrate de crear la carpeta 'Comercios' dentro de views/Proyecto
        return view('Proyecto.Comercios.index', compact('comercios'));
    }

    // --- 2. MOSTRAR FORMULARIO DE CREAR ---
    public function create()
    {
        // Este es tu "Formulario1.blade.php"
        return view('Proyecto.Comercios.Formulario1');
    }

    // --- 3. GUARDAR NUEVO (Store) ---
    public function store(Request $request)
    {
      $request->validate([
        'nombre' => 'required|max:255',
        'id_usuario' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
    ]);
    // 2. Preparar los datos para guardar
    $datos = $request->all();

    // 3. Lógica para la foto
    if ($request->hasFile('foto')) {
        // Guarda la foto en storage/app/public/fotos_comercios
        $rutaFoto = $request->file('foto')->store('fotos_comercios', 'public');
        
        // Sobreescribimos el valor de 'foto' con la ruta generada
        $datos['foto'] = $rutaFoto;
    }

        // 4. Crear el comercio con todos los datos
    Comercio::create([
        'id_usuario'       => $datos['id_usuario'],
        'nombre'           => $datos['nombre'],
        'descripcion'      => $datos['descripcion'],
        'direccion'        => $datos['direccion'],
        'ciudad'           => $datos['ciudad'],
        'horario_apertura' => $request->horario_apertura,
        'horario_cierre'   => $request->horario_cierre,
        'activo'           => $request->has('activo') ? 1 : 0,
        'foto'             => $datos['foto'] ?? null, // Guardamos la ruta o null
    ]);

    return redirect()->route('comercios.index')->with('success', 'Comercio creado con éxito');
}

    // --- 4. MOSTRAR FORMULARIO DE EDITAR ---
    public function edit($id)
    {
        $comercio = Comercio::findOrFail($id);
        // Usaremos una vista separada para editar para evitar confusiones
        return view('Proyecto.Comercios.edit', compact('comercio'));
    }

    // --- 5. ACTUALIZAR (Update) ---
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $comercio = Comercio::findOrFail($id);

        $comercio->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'horario_apertura' => $request->horario_apertura,
            'horario_cierre' => $request->horario_cierre,
            'activo' => $request->has('activo') ? 1 : 0
        ]);

        return redirect()->route('comercios.index')->with('success', 'Comercio actualizado');
    }

    // --- 6. ELIMINAR (Destroy) ---
    public function destroy($id)
    {
        $comercio = Comercio::findOrFail($id);
        $comercio->delete();

        return redirect()->route('comercios.index')->with('success', 'Comercio eliminado');
    }
}