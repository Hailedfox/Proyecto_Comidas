<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function guardar(Request $request)
    {
         $request->validate([
        'nombre' => 'required',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:3',
        'telefono' => 'nullable|unique:usuarios,telefono',
        'rol' => 'required'
    ],[
        'email.unique' => 'Este correo ya está registrado',
        'telefono.unique' => 'Este teléfono ya está registrado'
    ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'activo' => $request->activo ?? 0
        ]);

        return redirect('/Sesion')->with('success','Usuario guardado');
    }
}
