<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;

class AdministradoresController extends Controller
{
    public function index() // Mostrar la vista de administradores
    {
        $admins =Administrador::all();// Obtener todos los administradores de la base de datos
        return $admins;
    }
}
