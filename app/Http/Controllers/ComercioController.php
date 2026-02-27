<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comercio; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ComercioController extends Controller
{
    public function index()
    {
        // Traemos los comercios junto con el nombre de su usuario dueño
        $comercios = Comercio::with('usuario')->get(); 
        return view('Proyecto.Comercios.index', compact('comercios'));
    }

    public function create()
    {
        return view('Proyecto.Comercios.Formulario1');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'id_usuario' => 'required|exists:users,id', // Verifica que el usuario exista
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $rutaFoto = null;

        if ($request->hasFile('foto')) {
            $rutaFoto = $request->file('foto')->store('fotos_comercios', 'public');
        }

        Comercio::create([
            'id_usuario'       => $request->id_usuario,
            'nombre'           => $request->nombre,
            'descripcion'      => $request->descripcion,
            'direccion'        => $request->direccion,
            'ciudad'           => $request->ciudad,
            'horario_apertura' => $request->horario_apertura,
            'horario_cierre'   => $request->horario_cierre,
            'activo'           => $request->has('activo') ? 1 : 0,
            'foto'             => $rutaFoto,
        ]);

        return redirect()->route('comercios.index')->with('success', 'Comercio creado con éxito');
    }

    public function edit($id)
    {
        $comercio = Comercio::findOrFail($id);
        return view('Proyecto.Comercios.edit', compact('comercio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'foto' => 'nullable|image|max:2048'
        ]);

        $comercio = Comercio::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($comercio->foto) {
                Storage::disk('public')->delete($comercio->foto);
            }
            $comercio->foto = $request->file('foto')->store('fotos_comercios', 'public');
        }

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

    // 🔒 PROTECCIÓN APLICADA: Solo el MASTER puede eliminar
    public function destroy($id)
    {
        if (!Auth::user() || !Auth::user()->esMaster()) {
            return redirect()->route('comercios.index')->with('error', 'Solo los administradores Master pueden borrar comercios.');
        }

        $comercio = Comercio::findOrFail($id);
        
        if ($comercio->foto) {
            Storage::disk('public')->delete($comercio->foto);
        }

        $comercio->delete();
        return redirect()->route('comercios.index')->with('success', 'Comercio eliminado');
    }
}