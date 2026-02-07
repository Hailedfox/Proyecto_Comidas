<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comercio;

class ComercioController extends Controller
{
    public function index()
    {
        $comercios = Comercio::all();
        return view('Proyecto.Comercios.index2', compact('comercios'));
    }

    public function create()
    {
        return view('Proyecto.Comercios.formulario1');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'id_usuario' => 'required|integer',
            'descripcion' => 'nullable',
            'direccion' => 'nullable',
            'ciudad' => 'nullable',
            'horario_apertura' => 'nullable',
            'horario_cierre' => 'nullable',
        ]);

        $validated['activo'] = $request->has('activo') ? 1 : 0;

        Comercio::create($validated);

        return redirect()->route('comercios.index')
            ->with('success','Comercio registrado correctamente');
    }

    public function edit($id)
    {
        $comercio = Comercio::findOrFail($id);
        return view('Proyecto.Comercios.formulario1', compact('comercio'));
    }

    public function update(Request $request, $id)
    {
        $comercio = Comercio::findOrFail($id);

        $data = $request->all();
        $data['activo'] = $request->has('activo') ? 1 : 0;

        $comercio->update($data);

        return redirect()->route('comercios.index');
    }

    public function destroy($id)
    {
        Comercio::destroy($id);
        return redirect()->route('comercios.index');
    }
}
