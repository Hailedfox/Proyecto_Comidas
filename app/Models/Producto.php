<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;

    protected $fillable = [
        'id_comercio',
        'id_categoria',
        'nombre',
        'descripcion',
        'precio_original',
        'precio_descuento',
        'cantidad_disponible',
        'fecha_caducidad',
        'hora_recogida_inicio',
        'hora_recogida_fin',
        'activo'
    ];
}
