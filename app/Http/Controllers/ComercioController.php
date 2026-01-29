<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comercio;

class ComercioController extends Controller
{
  
    public function create()
    {
        
        return view('Proyecto.Comercios.Formulario1');
    }

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'nombre'           => 'required|string|max:255',
            'descripcion'      => 'nullable|string',
            'direccion'        => 'nullable|string|max:255',
            'ciudad'           => 'nullable|string|max:100',
            'horario_apertura' => 'nullable',
            'horario_cierre'   => 'nullable',
            'id_usuario'       => 'required|integer', 
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo') ? 1 : 0;


        Comercio::create($data);

        return redirect('/')->with('success', '¡Comercio registrado exitosamente!');
    }
}