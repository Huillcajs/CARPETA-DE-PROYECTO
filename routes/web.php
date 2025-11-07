<?php

use App\Http\Controllers\GuiaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ACTIVIDADController;
use App\Http\Controllers\GUIASController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

// Página principal
Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
// Rutas de login / register (Laravel Auth por defecto)
Auth::routes();

// Dashboard después de iniciar sesión
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// ====================
// LOGIN CON GOOGLE
// ====================
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

// ====================
// LOGIN CON GITHUB
// ====================
Route::get('login/github', [LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [LoginController::class, 'handleGithubCallback']);

// ====================
// TUS RUTAS PERSONALIZADAS
// ====================
Route::get('/actividad', function () {
    return view('actividades.actividad');
});

Route::get('/guia', function () {
    return view('guias_practicas.guia');
});

Route::get('/descargar-actividad/{nombre}', [ACTIVIDADController::class, 'descargarActividad'])->name('descargar.actividad');
Route::get('/descargar-guia/{nombre}', [GUIASController::class, 'descargarGuia'])->name('descargar.guia');
=======
// La ruta de recursos crea automáticamente: index, create, store, show, edit, update, destroy
Route::resource('guias', GuiaController::class);

// Puedes definir una ruta principal si quieres que sea la página de inicio
Route::redirect('/', '/guias');
>>>>>>> Gian
