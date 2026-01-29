<?php

use Illuminate\Support\Facades\Route;
// Importar el controlador de administradores

//Proyecto
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComercioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::view('/Galeria', '/Galeria/galeria');
Route::view('/Inicio', '/Inicio/inicio');
Route::view('/Mis metas', '/Mis metas/metas');
Route::view('/Mis pasatiempos', '/Mis pasatiempos/pasatiempo');
Route::view('/Quien soy', '/Quien soy/quien-soy');
Route::view('/Prueba', '/Prueba/prueba');
Route::view('/admins/crear', '/administradores/formulario-crear');
//Proyecto
Route::view('/', '/Proyecto/Bienvenida');
Route::view('/Producto', 'Proyecto.Productos.Formulario3');
Route::view('/comercios', 'Proyecto.Comercios.Formulario1');
Route::view('/1', 'Proyecto.Bienvenida2');
Route::view('/Usuarios', 'Proyecto.Usuarios.Formulario2');


 //ruta para administradores

//Proyecto
Route::post('/guardar_usuario', [UsuarioController::class,'guardar']);
Route::post('/guardar_producto', [ProductoController::class,'guardar']);

Route::get('/comercios', [ComercioController::class, 'create'])->name('comercios.create');
Route::post('/comercios', [ComercioController::class, 'store'])->name('comercios.store');


