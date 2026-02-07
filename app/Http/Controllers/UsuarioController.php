<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
{
    $usuarios = Usuario::all();
    return view('Proyecto.Usuarios.index3', compact('usuarios'));
}

public function edit($id)
{
    $usuario = Usuario::findOrFail($id);

    return view('Proyecto.Usuarios.Formulario2', compact('usuario'));
}

public function update(Request $request, $id)
{
    $usuario = Usuario::findOrFail($id);
    $usuario->update($request->all());
    return redirect()->route('usuarios.index');
}

public function destroy($id)
{
    Usuario::destroy($id);
    return redirect()->route('usuarios.index');
}
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
