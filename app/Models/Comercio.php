<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    use HasFactory;

    protected $table = 'comercios';

    protected $primaryKey = 'id_comercio';   // ⭐ IMPORTANTE

    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'nombre',
        'descripcion',
        'direccion',
        'ciudad',
        'horario_apertura',
        'horario_cierre',
        'activo',
        'foto',
    ];
}
