<?php

use App\Http\Controllers\ACTIVIDADController;
use App\Http\Controllers\GUIASController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actividad', function(){
    return view('actividades.actividad');
});

Route::get('/guia', function(){
    return view('guias_practicas.guia');
});

Route::get('/descargar-actividad/{nombre}', [ACTIVIDADController::class, 'descargarActividad'])->name('descargar.actividad');
Route::get('/descargar-guia/{nombre}', [GUIASController::class, 'descargarGuia'])->name('descargar.guia');
