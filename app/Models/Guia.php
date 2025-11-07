<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    /** @use HasFactory<\Database\Factories\GuiaFactory> */
    use HasFactory;

        protected $fillable = [
        'titulo',
        'descripcion_corta',
        'imagen_path', // El campo para la ruta de la imagen
        'pdf_path',    // El campo para la ruta del PDF
        'enlace_github',
    ];
}
