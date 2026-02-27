<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; 
use App\Models\Comercio; // Importamos el modelo Comercio
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('comercio')->get();
        return view('Proyecto.Productos.index', compact('productos'));
    }

    public function create()
    {
        // Traemos todos los comercios para llenar el select dinámicamente
        $comercios = Comercio::all();
        return view('Proyecto.Productos.Formulario3', compact('comercios'));
    }

    public function guardar(Request $request)
    {
        // Validación: el id_comercio debe existir en la tabla comercios
        $request->validate([
            'id_comercio' => 'required|exists:comercios,id_comercio',
            'nombre' => 'required|string|max:150',
            'precio_original' => 'required|numeric',
            'precio_descuento' => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
            'fecha_caducidad' => 'required|date',
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

        return redirect()->route('productos.index')->with('success','Producto guardado correctamente');  
    }

    public function destroy($id)
    {
        if (!Auth::user() || !Auth::user()->esMaster()) {
            return redirect()->route('productos.index')->with('error', 'No tienes permisos.');
        }
        Producto::findOrFail($id)->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado');
    }
}