<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Necesario para revisar quién está logueado

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

        // Si sube una nueva foto, borramos la vieja y guardamos la nueva
        if ($request->hasFile('foto')) {
            if ($usuario->foto) {
                Storage::disk('public')->delete($usuario->foto);
            }
            $usuario->foto = $request->file('foto')->store('usuarios', 'public');
        }

        // Evitamos que actualice la contraseña si la dejó en blanco en editar
        $data = $request->except(['foto', 'password']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado');
    }

    // 🔒 PROTECCIÓN APLICADA: Solo el MASTER puede eliminar
    public function destroy($id)
    {
        if (!Auth::user() || !Auth::user()->esMaster()) {
            return redirect()->route('usuarios.index')->with('error', 'No tienes permisos para eliminar usuarios.');
        }

        $usuario = Usuario::findOrFail($id);
        
        // Borrar foto del servidor si existe
        if ($usuario->foto) {
            Storage::disk('public')->delete($usuario->foto);
        }
        
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255', // Cambiado a 'name' si usaste el modelo nuevo, pero lo dejamos nombre por tu form
            'email' => 'required|email|unique:users,email', // OJO: La tabla es 'users' según tu DB
            'password' => 'required|min:4',
            'telefono' => 'nullable|unique:users,telefono',
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
            'name' => $request->nombre, // Según tu DB es 'name'
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'activo' => $request->has('activo') ? 1 : 0,
            'foto' => $rutaFoto
        ]);

        return redirect('/Sesion')->with('success','Usuario guardado exitosamente');
    }
}