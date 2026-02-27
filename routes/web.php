<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controladores del Proyecto
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SocialController;

/*
|--------------------------------------------------------------------------
| VISTAS DE TAREAS ANTERIORES
|--------------------------------------------------------------------------
*/
Route::view('/Galeria', '/Galeria/galeria');
Route::view('/Inicio', '/Inicio/inicio');
Route::view('/Mis metas', '/Mis metas/metas');
Route::view('/Mis pasatiempos', '/Mis pasatiempos/pasatiempo');
Route::view('/Quien soy', '/Quien soy/quien-soy');
Route::view('/Prueba', '/Prueba/prueba');

/*
|--------------------------------------------------------------------------
| RUTA DE BIENVENIDA (CON APIS)
|--------------------------------------------------------------------------
*/
Route::get('/', [ApiController::class, 'index'])->name('inicio');

/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN (LOGIN, LOGOUT, GOOGLE)
|--------------------------------------------------------------------------
*/
Route::view('/Sesion', 'Proyecto.Insesion.sesion')->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas de Google (Socialite)
Route::get('/login-google', [SocialController::class, 'redirect'])->name('google.login');
Route::get('/google-callback', [SocialController::class, 'callback']);

/*
|--------------------------------------------------------------------------
| REGISTRO PÚBLICO
|--------------------------------------------------------------------------
*/
Route::get('/usuarios/crear', function () {
    return view('Proyecto.Usuarios.Formulario2');
})->name('usuarios.create');

Route::post('/guardar_usuario', [UsuarioController::class, 'guardar'])->name('usuarios.store');

/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (REQUIEREN INICIAR SESIÓN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Panel Principal y Perfil
    Route::get('/Principal1', function () {
        return view('Proyecto.Principal.principal1');
    })->name('principal');
    
    Route::view('/Perfil', 'Proyecto.Usuarios.Perfil')->name('perfil');

    /* --- PRODUCTOS CRUD --- */
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/guardar_producto', [ProductoController::class, 'guardar'])->name('productos.store');
    Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    /* --- COMERCIOS CRUD --- */
    Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.index');
    Route::get('/comercios/crear', [ComercioController::class, 'create'])->name('comercios.create');
    Route::post('/guardar_comercio', [ComercioController::class, 'store'])->name('comercios.store');
    Route::get('/comercios/{id}/editar', [ComercioController::class, 'edit'])->name('comercios.edit');
    Route::put('/comercios/{id}', [ComercioController::class, 'update'])->name('comercios.update');
    Route::delete('/comercios/{id}', [ComercioController::class, 'destroy'])->name('comercios.destroy');

    /* --- USUARIOS CRUD --- */
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
});