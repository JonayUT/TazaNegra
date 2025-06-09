@extends('Plantillas.base')

@section('title', 'Novedades')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold text-center mb-8">Novedades</h1>
    
    <!-- Panel grande para el feed de Instagram -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-10">
        <h2 class="text-2xl font-semibold mb-4 text-center">Síguenos en Instagram</h2>
        <div class="flex justify-center">
            {{-- Aquí va el widget/iframe del feed de Instagram --}}
            <iframe src="https://snapwidget.com/embed/123456" class="w-full max-w-2xl h-[400px] border-none" allowtransparency="true" scrolling="no"></iframe>
        </div>
        <p class="text-center text-gray-500 mt-4">
            ¡No te pierdas nuestras últimas publicaciones! <a href="https://instagram.com/cafe.tazanegra" target="_blank" class="text-pink-600 underline">Ver en Instagram</a>
        </p>
    </div>

    <!-- Noticias destacadas o blog -->
    <div class="mb-10">
        <h2 class="text-xl font-semibold mb-4">Noticias y Eventos</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-gray-100 rounded-lg p-4 shadow flex flex-col">
                <span class="text-xs text-gray-500 mb-2">10 Jun 2025</span>
                <h3 class="font-bold mb-2">¡Nuevo café de temporada!</h3>
                <p class="text-gray-600 mb-2">Descubre nuestro café edición limitada con notas frutales y aroma intenso. Solo por tiempo limitado.</p>
                <a href="#" class="text-green-700 hover:underline mt-auto">Leer más</a>
            </div>
            <div class="bg-gray-100 rounded-lg p-4 shadow flex flex-col">
                <span class="text-xs text-gray-500 mb-2">01 Jun 2025</span>
                <h3 class="font-bold mb-2">Participa en nuestro taller de barismo</h3>
                <p class="text-gray-600 mb-2">Aprende a preparar el café perfecto con nuestros expertos. Cupos limitados, ¡regístrate ya!</p>
                <a href="#" class="text-green-700 hover:underline mt-auto">Leer más</a>
            </div>
            <div class="bg-gray-100 rounded-lg p-4 shadow flex flex-col">
                <span class="text-xs text-gray-500 mb-2">25 May 2025</span>
                <h3 class="font-bold mb-2">¡Gracias por acompañarnos en el Coffee Fest!</h3>
                <p class="text-gray-600 mb-2">Un resumen de los mejores momentos y fotos del evento. ¡Nos vemos el próximo año!</p>
                <a href="#" class="text-green-700 hover:underline mt-auto">Leer más</a>
            </div>
        </div>
    </div>

    <!-- Suscripción a newsletter -->
    <div class="bg-white rounded-xl shadow-lg p-6 max-w-xl mx-auto">
        <h2 class="text-xl font-semibold mb-2 text-center">Suscríbete a nuestro boletín</h2>
        <p class="text-gray-600 text-center mb-4">Recibe novedades, promociones y eventos directamente en tu correo.</p>
        <form class="flex flex-col sm:flex-row gap-2 justify-center">
            <input type="email" placeholder="Tu correo electrónico" class="border rounded px-3 py-2 flex-1 focus:outline-none focus:ring-2 focus:ring-green-600">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded px-4 py-2 transition">Suscribirme</button>
        </form>
    </div>
</div>
@endsection