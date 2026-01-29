<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    protected $table = 'comercios';
    public $timestamps = false;     

    protected $fillable = [
        'id_usuario',
        'nombre',
        'descripcion',
        'direccion',
        'ciudad',
        'horario_apertura',
        'horario_cierre',
        'activo'
    ];
}