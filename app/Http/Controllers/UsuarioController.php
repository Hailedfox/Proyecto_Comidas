<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function guardar(Request $request)
    {
        dd('ENTRO AL CONTROLADOR');
    }
}
