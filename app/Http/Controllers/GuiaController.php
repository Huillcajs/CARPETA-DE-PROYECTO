<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuiaController extends Controller
{
 public function index()
    {
        $guias = Guia::all();
        // Carga la vista 'guias/index.blade.php' y pasa la colección de guías
        return view('guias.index', compact('guias'));
    }

    /**
     * Muestra el formulario para crear una nueva guía.
     */
    public function create()
    {
        return view('guias.create');
    }

    /**
     * Guarda una nueva guía en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validación de datos con reglas para archivos
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion_corta' => 'required',
            // Reglas para la imagen: debe ser una imagen, PNG o JPG/JPEG, tamaño máximo 2MB
            'imagen_path' => 'nullable|image|mimes:png,jpg,jpeg|max:5048', 
            // Reglas para el PDF: debe ser un archivo, de tipo PDF, tamaño máximo 5MB
            'pdf_path' => 'nullable|file|mimes:pdf|max:15120', 
            'enlace_github' => 'nullable|url',
        ]);

        // Preparamos los datos validados
        $data = $request->except(['imagen_path', 'pdf_path']);

        // 2. Manejo de la subida de la IMAGEN (PNG)
        if ($request->hasFile('imagen_path')) {
            // Guarda el archivo en storage/app/public/guias/images y obtiene la ruta
            $data['imagen_path'] = $request->file('imagen_path')->store('guias/images', 'public');
        }

        // 3. Manejo de la subida del PDF
        if ($request->hasFile('pdf_path')) {
            // Guarda el archivo en storage/app/public/guias/pdfs y obtiene la ruta
            $data['pdf_path'] = $request->file('pdf_path')->store('guias/pdfs', 'public');
        }

        // 4. Creación del registro
        Guia::create($data);

        // 5. Redirección con mensaje de éxito
        return redirect()->route('guias.index')
                         ->with('success', '¡Guía creada exitosamente, incluyendo archivos!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guia $guia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Guia $guia)
    {
        // El enrutamiento de modelo (Route Model Binding) encuentra automáticamente la Guía por ID
        return view('guias.edit', compact('guia'));
    }

    /**
     * Actualiza la guía especificada en la base de datos.
     */
    public function update(Request $request, Guia $guia)
    {
        // 1. Validación de datos
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion_corta' => 'required',
            // En 'update', los archivos siguen siendo opcionales, pero si se suben, deben cumplir las reglas.
            'imagen_path' => 'nullable|image|mimes:png,jpg,jpeg|max:5048', 
            'pdf_path' => 'nullable|file|mimes:pdf|max:9120', 
            'enlace_github' => 'nullable|url',
        ]);

        // Preparamos los datos validados
        $data = $request->except(['imagen_path', 'pdf_path']);

        // 2. Manejo de la subida y reemplazo de la IMAGEN
        if ($request->hasFile('imagen_path')) {
            // Eliminar la imagen antigua si existe
            if ($guia->imagen_path) {
                Storage::disk('public')->delete($guia->imagen_path);
            }
            // Guardar la nueva imagen y actualizar la ruta
            $data['imagen_path'] = $request->file('imagen_path')->store('guias/images', 'public');
        }

        // 3. Manejo de la subida y reemplazo del PDF
        if ($request->hasFile('pdf_path')) {
            // Eliminar el PDF antiguo si existe
            if ($guia->pdf_path) {
                Storage::disk('public')->delete($guia->pdf_path);
            }
            // Guardar el nuevo PDF y actualizar la ruta
            $data['pdf_path'] = $request->file('pdf_path')->store('guias/pdfs', 'public');
        }

        // 4. Actualización del registro
        $guia->update($data);

        // 5. Redirección con mensaje de éxito
        return redirect()->route('guias.index')
                         ->with('success', '¡Guía "' . $guia->titulo . '" actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guia $guia)
    {
        $guia->delete();
        return redirect()->route('guias.index')
                        ->with('success', '¡Guía eliminada correctamente!');
    }
}
