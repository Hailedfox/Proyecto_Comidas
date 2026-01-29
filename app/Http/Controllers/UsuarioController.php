<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function guardar(Request $request)
    {
        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password_hash' => Hash::make($request->password_hash),
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'activo' => $request->activo ?? 0
        ]);

        return redirect('/Usuarios')->with('success','Usuario guardado');
    }
}
