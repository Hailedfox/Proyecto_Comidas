<?php

namespace App\Http\Controllers;

use App\Models\User; // O el modelo que uses para usuarios (Usuario?)
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    // 1. Redirigir al usuario a Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // 2. Recibir la respuesta de Google
    public function callback()
    {
        try {
            // Obtenemos los datos del usuario desde Google
            $googleUser = Socialite::driver('google')->user();

            // Buscamos si ya existe un usuario con ese email o google_id
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Si existe, actualizamos su google_id por si acaso y lo logueamos
                $user->update(['google_id' => $googleUser->getId()]);
                Auth::login($user);
            } else {
                // Si NO existe, lo creamos
                $newUser = User::create([
                    'nombre' => $googleUser->getName(), // Asegúrate que tu columna se llame 'nombre'
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(Str::random(16)), // Contraseña aleatoria segura
                    'rol' => 'usuario', // Asigna un rol por defecto
                    'activo' => 1
                ]);

                Auth::login($newUser);
            }

            // Redirigir al dashboard o inicio
            return redirect()->route('inicio');

        } catch (\Exception $e) {
            // Si algo falla, redirigir al login con error
            return redirect('/Sesion')->with('error', 'Hubo un problema con el inicio de sesión de Google.');
        }
    }
}