@extends('Plantillas.base')

@section('title', 'Novedades')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold text-center mb-8">Novedades</h1>

    <!-- Panel grande para el feed de Instagram -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-10">
        <h2 class="text-2xl font-semibold mb-4 text-center">Síguenos en Instagram</h2>

        <div id="instagram-feed" class="flex flex-wrap justify-center gap-4 p-4">
            <!-- Los posts se cargarán aquí mediante JavaScript -->
        </div>

        <p class="text-center text-gray-500 mt-4">
            ¡No te pierdas nuestras últimas publicaciones!
            <a href="https://instagram.com/rulexvr" target="_blank" class="text-pink-600 underline">Ver en
                Instagram</a>
        </p>
    </div>

    <!-- Noticias destacadas o blog -->
    <div class="mb-10">
        <h2 class="text-xl font-semibold mb-4">Noticias y Eventos</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Tus cards de noticias -->
        </div>
    </div>

    <!-- Suscripción a newsletter -->
    <div class="bg-white rounded-xl shadow-lg p-6 max-w-xl mx-auto">
        <!-- Formulario de suscripción -->
    </div>
</div>

<!-- Cargar script compilado de Instagram -->
@vite('resources/js/components/instagram.js')
@endsection
