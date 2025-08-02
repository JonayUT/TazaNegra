@extends('Plantillas.base')

@section('title', 'Novedades')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold text-center mb-8">Novedades</h1>

    <!-- Panel grande para el feed de Instagram -->
    <div class="bg-black rounded-xl shadow-lg p-6 mb-10">
        <h2 class="text-2xl text-white font-hatton font-semibold mb-4 text-center">Síguenos en Instagram</h2>

        <div id="instagram-feed" class="flex justify-center items-center rounded-2xl overflow-hidden h-64 md:h-96 bg-cover bg-center"
            style="background-image: url('https://snapwidget.com/embed/1102488');">
            <!-- SnapWidget embed -->
            <script src="https://snapwidget.com/js/snapwidget.js"></script>
            <iframe src="https://snapwidget.com/embed/1102488" class="snapwidget-widget" allowtransparency="true"
                frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"
                title="Posts from Instagram"></iframe>
        </div>

        <p class="text-center text-white mt-4">
            ¡No te pierdas nuestras últimas publicaciones!
            <a href="https://instagram.com/rulexvr" target="_blank" class="text-blue-600 underline">Ver en Instagram</a>
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
@endsection
