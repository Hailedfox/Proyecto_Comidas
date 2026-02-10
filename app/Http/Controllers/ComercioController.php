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
            'id_usuario' => 'required', // Importante: Debes enviar un ID de usuario válido
        ]);

        Comercio::create([
            'id_usuario' => $request->id_usuario,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'horario_apertura' => $request->horario_apertura,
            'horario_cierre' => $request->horario_cierre,
            // Si el checkbox no se marca, guardamos 0
            'activo' => $request->has('activo') ? 1 : 0
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