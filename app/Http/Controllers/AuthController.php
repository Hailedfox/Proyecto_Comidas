<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Agregamos la referencia a tu modelo para que el sistema sepa qué clase usar
use App\Models\Usuario; 

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validamos que lleguen los datos para evitar errores de sistema
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // 2. Intentamos iniciar sesión
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            // Redirige a la página principal tras un login exitoso
            return redirect()->intended('/Principal1');
        }

        // 3. Si falla, regresamos con el mensaje de error que ya tienes en tu vista
        return back()->with('error', 'El correo o la contraseña son incorrectos.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/Sesion');
    }
}