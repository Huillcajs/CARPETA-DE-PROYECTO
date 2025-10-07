@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-7xl">
    <!-- TÍTULO CENTRAL -->
    <h1 class="text-3xl font-extrabold text-gray-900 text-center uppercase tracking-widest mb-6">GUÍAS PRÁCTICAS</h1>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
        
        <!-- CAMPO DE BÚSQUEDA -->
        <div class="w-full md:w-1/3">
            <input type="text" id="searchInput" onkeyup="filterGuides()" placeholder="Buscar por título o descripción..." 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-900 transition duration-150">
        </div>

        <!-- Botón para Crear Nueva Guía -->
        <a href="{{ route('guias.create') }}" class="w-full md:w-auto bg-gray-900 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded shadow-lg transition duration-300 text-center">
            <!-- Icono de más (+) -->
            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Crear Nueva Guía
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- CONTENEDOR DE LA CUADRÍCULA -->
    <div id="guidesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($guias as $guia)
        
        <!-- CARD INDIVIDUAL (Añadido la clase .guia-card y data-attributes para JS) -->
        <div class="guia-card bg-white rounded-lg shadow-xl overflow-hidden border border-gray-100 flex flex-col transform transition duration-500 hover:shadow-2xl hover:scale-[1.02]"
             data-title="{{ Str::lower($guia->titulo) }}"
             data-description="{{ Str::lower($guia->descripcion_corta) }}">
            
            <!-- ÁREA DE IMAGEN -->
            <div class="h-48 bg-gray-200 flex items-center justify-center p-4">
                @if ($guia->imagen_path)
                    <img src="{{ asset('storage/' . $guia->imagen_path) }}" alt="{{ $guia->titulo }}" class="w-full h-full object-cover rounded" onerror="this.onerror=null;this.src='https://placehold.co/600x400/CCCCCC/666666?text=Miniatura';">
                @else
                    <!-- Placeholder con el estilo gris del mockup -->
                    <div class="w-full h-full bg-gray-300 rounded flex items-center justify-center">
                        <span class="text-gray-500 text-sm font-semibold">SIN IMAGEN</span>
                    </div>
                @endif
            </div>

            <div class="p-5 flex flex-col flex-grow">
                <!-- TÍTULO DE LA GUÍA -->
                <h2 class="text-xl font-bold text-gray-900 mb-2 uppercase">{{ $guia->titulo }}</h2>
                
                <!-- DESCRIPCIÓN CORTA -->
                <p class="text-gray-600 text-sm mb-4 flex-grow">{{ $guia->descripcion_corta }}</p>

                <!-- CONTENEDOR DE ENLACES -->
                <div class="flex flex-col space-y-3 mt-4 pt-3 border-t border-gray-100">
                    
                    <!-- 1. Botón VER EN GITHUB (si existe el enlace) -->
                    @if ($guia->enlace_github)
                        <a href="{{ $guia->enlace_github }}" target="_blank" class="flex items-center justify-center bg-gray-900 text-white text-sm font-semibold py-2 rounded transition duration-200 hover:bg-gray-700 shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 0C5.372 0 0 5.373 0 12c0 5.303 3.438 9.809 8.205 11.385.6.11.82-.257.82-.573 0-.28-.01-1.017-.015-2.001-3.337.724-4.042-1.611-4.042-1.611-.546-1.385-1.332-1.755-1.332-1.755-1.087-.745.083-.73.083-.73 1.205.085 1.838 1.238 1.838 1.238 1.07 1.836 2.809 1.305 3.491.996.108-.775.419-1.305.762-1.603-2.665-.304-5.466-1.334-5.466-5.93 0-1.31.469-2.379 1.236-3.22-.124-.303-.536-1.523.116-3.176 0 0 1-.322 3.297 1.23.96-.267 1.98-.4 3-.404 1.02.004 2.04.137 3 .404 2.297-1.552 3.296-1.23 3.296-1.23.653 1.653.24 2.873.117 3.176.766.841 1.235 1.91 1.235 3.22 0 4.607-2.802 5.624-5.474 5.918.428.373.812 1.103.812 2.223 0 1.604-.015 2.898-.015 3.28 0 .318.216.688.823.57C20.562 21.815 24 17.309 24 12c0-6.627-5.372-12-12-12z" clip-rule="evenodd"/></svg>
                            VER EN GITHUB
                        </a>
                    @endif
                    
                    <!-- 2. Botón DESCARGAR (si existe el PDF) -->
                    @if ($guia->pdf_path)
                        <a href="{{ asset('storage/' . $guia->pdf_path) }}" target="_blank" class="flex items-center justify-center border border-gray-900 text-gray-900 text-sm font-semibold py-2 rounded transition duration-200 hover:bg-gray-100">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            DESCARGAR (PDF)
                        </a>
                    @endif
                </div>

                <!-- ENLACES DE GESTIÓN (Editar/Eliminar) -->
                <div class="mt-4 pt-3 border-t border-dashed border-gray-200 flex justify-between text-xs">
                    <a href="{{ route('guias.edit', $guia) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Editar</a>
                    
                    <form action="{{ route('guias.destroy', $guia) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('¿Estás seguro de eliminar esta guía? Esta acción es irreversible.')">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- FIN DE CARD INDIVIDUAL -->
        @endforeach
    </div>

    @if ($guias->isEmpty())
        <p id="no-guides-message" class="text-center text-gray-500 mt-12">Aún no hay guías prácticas creadas.</p>
    @else
        <!-- Mensaje para cuando no hay resultados de la búsqueda -->
        <p id="no-results-message" class="text-center text-gray-500 mt-12 hidden">No se encontraron guías que coincidan con la búsqueda.</p>
    @endif
</div>

<!-- LÓGICA DE BÚSQUEDA CON JAVASCRIPT -->
<script>
    function filterGuides() {
        // Obtiene el valor de búsqueda, lo convierte a minúsculas y quita espacios
        const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
        // Obtiene todas las tarjetas
        const cards = document.querySelectorAll('.guia-card');
        const noResultsMessage = document.getElementById('no-results-message');
        let foundResults = false;

        cards.forEach(card => {
            // Obtiene los datos del título y la descripción guardados en los atributos data-
            const title = card.getAttribute('data-title');
            const description = card.getAttribute('data-description');

            // Comprueba si el término de búsqueda está incluido en el título o la descripción
            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                card.style.display = ''; // Muestra la tarjeta
                foundResults = true;
            } else {
                card.style.display = 'none'; // Oculta la tarjeta
            }
        });

        // Muestra u oculta el mensaje de "No se encontraron resultados"
        if (noResultsMessage) {
            if (foundResults) {
                noResultsMessage.classList.add('hidden');
            } else {
                noResultsMessage.classList.remove('hidden');
            }
        }
    }

    // Inicializa la búsqueda si hay un término preexistente
    window.onload = filterGuides;
</script>
@endsection

