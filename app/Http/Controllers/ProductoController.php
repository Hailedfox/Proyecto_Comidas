<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function guardar(Request $request)
    {
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
            'activo' => $request->activo ?? 0
        ]);

        return redirect('/Producto')->with('success','Producto guardado');
    }
}
