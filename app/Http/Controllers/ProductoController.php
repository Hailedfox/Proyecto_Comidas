<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; 

class ProductoController extends Controller
{
    
    public function index()
    {
        
        $productos = Producto::all(); 
        
        
        return view('Proyecto.Productos.index', compact('productos'));
    }


    public function create()
    {
        return view('Proyecto.Productos.Formulario3');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio_original' => 'required|numeric',
            'precio_descuento' => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
            'fecha_caducidad' => 'required',
            'id_comercio' => 'required'
        ]);

        Producto::create([
            'id_comercio' => $request->id_comercio,
            'id_categoria' => $request->id_categoria,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio_original' => $request->precio_original,
            'precio_descuento' => $request->precio_descuento,
            'cantidad_disponible' => $request->cantidad_disponible,
            'fecha_caducidad' => $request->fecha_caducidad,
            'hora_recogida_inicio' => $request->hora_recogida_inicio,
            'hora_recogida_fin' => $request->hora_recogida_fin,
            'activo' => $request->has('activo') ? 1 : 0
        ]);


        return redirect('/producto')->with('success','Producto guardado correctamente');  
    }
}