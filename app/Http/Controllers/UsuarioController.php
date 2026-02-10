<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('foto')) {

            if ($usuario->foto) {
                Storage::disk('public')->delete($usuario->foto);
            }

            $usuario->foto = $request->file('foto')->store('usuarios', 'public');
        }

        $usuario->update($request->except('foto'));

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
            'rol' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],[
            'email.unique' => 'Este correo ya está registrado',
            'telefono.unique' => 'Este teléfono ya está registrado'
        ]);

        $rutaFoto = null;

        if ($request->hasFile('foto')) {
            $rutaFoto = $request->file('foto')->store('usuarios', 'public');
        }

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'activo' => $request->activo ?? 0,
            'foto' => $rutaFoto
        ]);

        return redirect('/Sesion')->with('success','Usuario guardado');
    }
}
