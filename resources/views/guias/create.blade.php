@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Crear Nueva Guía</h1>
    <a href="{{ route('guias.index') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">← Volver al listado</a>

    <div class="bg-white shadow-md rounded p-6">
        <!-- ¡CRÍTICO! Necesitas enctype="multipart/form-data" para subir archivos -->
        <form action="{{ route('guias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Campo Título -->
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                <input type="text" name="titulo" id="titulo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('titulo') border-red-500 @enderror" value="{{ old('titulo') }}" required>
                @error('titulo')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Descripción Corta -->
            <div class="mb-4">
                <label for="descripcion_corta" class="block text-gray-700 text-sm font-bold mb-2">Descripción Corta:</label>
                <textarea name="descripcion_corta" id="descripcion_corta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('descripcion_corta') border-red-500 @enderror" rows="3" required>{{ old('descripcion_corta') }}</textarea>
                @error('descripcion_corta')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- CAMPO PARA IMAGEN (PNG/JPG) -->
            <div class="mb-4">
                <label for="imagen_path" class="block text-gray-700 text-sm font-bold mb-2">Imagen PNG/JPG (Opcional):</label>
                <input type="file" name="imagen_path" id="imagen_path" accept="image/png, image/jpeg" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('imagen_path') border-red-500 @enderror">
                <small class="text-gray-500">Solo archivos PNG o JPG, máximo 5MB.</small>
                @error('imagen_path')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- CAMPO PARA PDF -->
            <div class="mb-4">
                <label for="pdf_path" class="block text-gray-700 text-sm font-bold mb-2">Documento PDF (Opcional):</label>
                <input type="file" name="pdf_path" id="pdf_path" accept="application/pdf" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('pdf_path') border-red-500 @enderror">
                <small class="text-gray-500">Solo archivos PDF, máximo 8MB.</small>
                @error('pdf_path')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Campo Enlace a GitHub -->
            <div class="mb-6">
                <label for="enlace_github" class="block text-gray-700 text-sm font-bold mb-2">Enlace a GitHub (Opcional):</label>
                <!-- Nota: Usamos 'enlace_github' en lugar de 'imagen_url' -->
                <input type="url" name="enlace_github" id="enlace_github" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('enlace_github') border-red-500 @enderror" value="{{ old('enlace_github') }}">
                @error('enlace_github')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Guardar Guía
                </button>
            </div>
        </form>
    </div>
</div>
@endsection