@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Guía: {{ $guia->titulo }}</h1>
    <a href="{{ route('guias.index') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">← Volver al listado</a>

    <div class="bg-white shadow-md rounded p-6">
        <!-- CRÍTICO: Usar @method('PUT') y enctype para archivos -->
        <form action="{{ route('guias.update', $guia) }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
            
            <!-- Campo Título (Pre-llenado) -->
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                <input type="text" name="titulo" id="titulo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" value="{{ old('titulo', $guia->titulo) }}" required>
                @error('titulo')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Descripción (Pre-llenado) -->
            <div class="mb-4">
                <label for="descripcion_corta" class="block text-gray-700 text-sm font-bold mb-2">Descripción Corta:</label>
                <textarea name="descripcion_corta" id="descripcion_corta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" rows="3" required>{{ old('descripcion_corta', $guia->descripcion_corta) }}</textarea>
                @error('descripcion_corta')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- CAMPO PARA IMAGEN (PNG) -->
            <div class="mb-4 p-4 border rounded border-gray-200">
                <label for="imagen_path" class="block text-gray-700 text-sm font-bold mb-2">Imagen PNG/JPG (Reemplazar):</label>
                
                @if ($guia->imagen_path)
                    <p class="text-sm mb-2">**Archivo actual:** <img src="{{ asset('storage/' . $guia->imagen_path) }}" alt="Miniatura Actual" style="width: 80px; height: 80px; object-fit: cover; display: block;"></p>
                @else
                    <p class="text-sm mb-2 text-gray-500">No hay imagen actual.</p>
                @endif

                <input type="file" name="imagen_path" id="imagen_path" accept="image/png, image/jpeg" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                <small class="text-gray-500">Sube una nueva imagen solo si deseas reemplazar la actual.</small>
                @error('imagen_path')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- CAMPO PARA PDF -->
            <div class="mb-4 p-4 border rounded border-gray-200">
                <label for="pdf_path" class="block text-gray-700 text-sm font-bold mb-2">Documento PDF (Reemplazar):</label>

                @if ($guia->pdf_path)
                    <p class="text-sm mb-2">**Archivo actual:** <a href="{{ asset('storage/' . $guia->pdf_path) }}" target="_blank" class="text-blue-500 hover:underline">Ver PDF actual</a></p>
                @else
                    <p class="text-sm mb-2 text-gray-500">No hay PDF actual.</p>
                @endif

                <input type="file" name="pdf_path" id="pdf_path" accept="application/pdf" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                <small class="text-gray-500">Sube un nuevo PDF solo si deseas reemplazar el actual.</small>
                @error('pdf_path')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Campo Enlace a GitHub (Pre-llenado) -->
            <div class="mb-6">
                <label for="enlace_github" class="block text-gray-700 text-sm font-bold mb-2">Enlace a GitHub (Opcional):</label>
                <input type="url" name="enlace_github" id="enlace_github" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" value="{{ old('enlace_github', $guia->enlace_github) }}">
                @error('enlace_github')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
