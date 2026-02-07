<?php

use Illuminate\Support\Facades\Route;
// Importar el controlador de administradores

//Proyecto
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComercioController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;






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
Route::view('/Perfil', 'Proyecto.Usuarios.Perfil')->name('Perfil');     
Route::view('/Nav2', 'Proyecto.Nav2.Nav');


 

// RUTAS DE PRODUCTOS
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/guardar_producto', [ProductoController::class, 'guardar'])->name('productos.store');

Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.index');
Route::get('/comercios/crear', [ComercioController::class, 'create'])->name('comercios.create');
Route::post('/guardar_comercio', [ComercioController::class, 'store'])->name('comercios.store');
// Rutas para editar y eliminar comercios
Route::get('/comercios/{id}/editar', [ComercioController::class, 'edit'])->name('comercios.edit');
Route::put('/comercios/{id}', [ComercioController::class, 'update'])->name('comercios.update');
Route::delete('/comercios/{id}', [ComercioController::class, 'destroy'])->name('comercios.destroy');






// RUTAS DE USUARIOS

Route::post('/guardar_usuario', [UsuarioController::class, 'guardar']);


// RUTAS DE COMERCIOS

Route::get('/Formulario1', [ComercioController::class, 'create'])->name('comercios.create');
Route::post('/comercios', [ComercioController::class, 'store'])->name('comercios.store');

//Rutas de Registro y Login
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/Principal1', function () {
    return view('Proyecto.Principal.principal1');
})->middleware('auth');


