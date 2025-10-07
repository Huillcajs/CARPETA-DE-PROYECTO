<?php

use App\Http\Controllers\GuiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// La ruta de recursos crea automáticamente: index, create, store, show, edit, update, destroy
Route::resource('guias', GuiaController::class);

// Puedes definir una ruta principal si quieres que sea la página de inicio
Route::redirect('/', '/guias');