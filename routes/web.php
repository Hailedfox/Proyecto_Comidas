<?php

use Illuminate\Support\Facades\Route;
// Importar el controlador de administradores

//Proyecto
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComercioController;




Route::view('/Galeria', '/Galeria/galeria');
Route::view('/Inicio', '/Inicio/inicio');
Route::view('/Mis metas', '/Mis metas/metas');
Route::view('/Mis pasatiempos', '/Mis pasatiempos/pasatiempo');
Route::view('/Quien soy', '/Quien soy/quien-soy');
Route::view('/Prueba', '/Prueba/prueba');
Route::view('/admins/crear', '/administradores/formulario-crear');

// RUTAS DE VISTAS PRINCIPALES
Route::view('/', 'Proyecto.Bienvenida2');
Route::view('/1', 'Proyecto.Bienvenida');
Route::view('/Usuarios', 'Proyecto.Usuarios.Formulario2');
Route::view('/Sesion', 'Proyecto.Insesion.sesion');

// RUTAS DE VISTAS PRINCIPALES
Route::view('/', 'Proyecto.Bienvenida2');
Route::view('/1', 'Proyecto.Bienvenida'); 
Route::view('/Usuarios', 'Proyecto.Usuarios.Formulario2');
Route::view('/Sesion', 'Proyecto.Insesion.sesion');
Route::view('/Principal1', 'Proyecto.Principal.principal1');

// RUTAS DE PRODUCTOS

Route::get('/producto', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/guardar_producto', [ProductoController::class, 'guardar'])->name('productos.store');


// RUTAS DE USUARIOS

Route::post('/guardar_usuario', [UsuarioController::class, 'guardar']);


// RUTAS DE COMERCIOS

Route::get('/comercios', [ComercioController::class, 'create'])->name('comercios.create');
Route::post('/comercios', [ComercioController::class, 'store'])->name('comercios.store');

