<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GUIASController extends Controller
{
    public function descargarGuia($nombre)
{
    // Sanitiza el nombre para evitar problemas de seguridad
    $archivo = basename($nombre); // esto evita rutas maliciosas

    $path = storage_path('app/pdfs/' . $archivo);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->download($path);
}
}
