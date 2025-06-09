
@extends('Plantillas.base')

@section('title', 'Contacto')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
    <div class="flex flex-col md:flex-row bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Imagen o mapa -->
        <div class="md:w-1/2 w-full h-72 md:h-auto bg-gray-200 flex items-center justify-center">
            <!-- Puedes poner aquí una imagen de la cafetería, un mapa o un slider -->
            <span class="text-gray-400 text-2xl font-bold">Imagen / Mapa</span>
        </div>
        <!-- Información y redes -->
        <div class="md:w-1/2 w-full flex flex-col items-center justify-center p-8">
            <h2 class="text-2xl font-bold mb-4 text-center">Contáctanos</h2>
            <p class="text-gray-600 mb-4 text-center">
                ¿Tienes dudas, comentarios o quieres hacer un pedido especial? <br>
                Escríbenos y te responderemos lo antes posible.
            </p>
            <div class="flex flex-col gap-2 w-full max-w-xs mx-auto mb-6">
                <input type="text" placeholder="Nombre" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                <input type="email" placeholder="Correo electrónico" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                <textarea placeholder="Mensaje" rows="3" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
                <button class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded px-4 py-2 mt-2 transition">Enviar mensaje</button>
            </div>
            <div class="flex justify-center gap-8 mt-6">
                <a href="https://wa.me/XXXXXXXXXX" target="_blank" class="flex flex-col items-center group">
                    <div class="w-12 h-12 border-2 border-gray-400 rounded flex items-center justify-center text-2xl group-hover:border-green-500 transition">
                        <svg class="w-7 h-7 text-green-500" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A11.93 11.93 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.18-1.62A11.93 11.93 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.19-3.48-8.52zM12 22c-1.85 0-3.67-.5-5.24-1.44l-.37-.22-3.67.97.98-3.58-.24-.37C2.5 15.67 2 13.85 2 12 2 6.48 6.48 2 12 2c2.21 0 4.31.72 6.03 2.03A9.93 9.93 0 0 1 22 12c0 5.52-4.48 10-10 10zm5.03-7.47c-.27-.13-1.6-.79-1.85-.88-.25-.09-.43-.13-.61.13-.18.26-.7.88-.86 1.06-.16.18-.32.2-.59.07-.27-.13-1.13-.42-2.15-1.34-.79-.7-1.32-1.56-1.48-1.83-.16-.27-.02-.41.12-.54.13-.13.29-.34.43-.51.14-.17.18-.29.27-.48.09-.19.05-.36-.02-.5-.07-.13-.61-1.47-.84-2.01-.22-.53-.45-.46-.61-.47-.16-.01-.36-.01-.56-.01-.19 0-.5.07-.76.34-.26.27-1 1.01-1 2.47 0 1.46 1.05 2.87 1.2 3.07.15.2 2.07 3.17 5.03 4.31.7.24 1.25.38 1.68.48.71.17 1.36.15 1.87.09.57-.07 1.6-.65 1.83-1.28.23-.63.23-1.17.16-1.28-.07-.11-.25-.18-.52-.31z"/></svg>
                    </div>
                    <span class="mt-2 text-sm text-gray-700">WhatsApp</span>
                </a>
                <a href="https://facebook.com/" target="_blank" class="flex flex-col items-center group">
                    <div class="w-12 h-12 border-2 border-gray-400 rounded flex items-center justify-center text-2xl group-hover:border-blue-600 transition">
                        <svg class="w-7 h-7 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/></svg>
                    </div>
                    <span class="mt-2 text-sm text-gray-700">Facebook</span>
                </a>
                <a href="https://instagram.com/" target="_blank" class="flex flex-col items-center group">
                    <div class="w-12 h-12 border-2 border-gray-400 rounded flex items-center justify-center text-2xl group-hover:border-pink-500 transition">
                        <svg class="w-7 h-7 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.332 3.608 1.308.975.976 1.246 2.243 1.308 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.332 2.633-1.308 3.608-.976.975-2.243 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.332-3.608-1.308-.975-.976-1.246-2.243-1.308-3.608C2.175 15.647 2.163 15.267 2.163 12s.012-3.584.07-4.85c.062-1.366.332-2.633 1.308-3.608.976-.975 2.243-1.246 3.608-1.308C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.013 7.052.072 5.771.131 4.659.363 3.678 1.344c-.981.981-1.213 2.093-1.272 3.374C2.013 5.668 2 6.077 2 12c0 5.923.013 6.332.072 7.613.059 1.281.291 2.393 1.272 3.374.981.981 2.093 1.213 3.374 1.272C8.332 23.987 8.741 24 12 24s3.668-.013 4.948-.072c1.281-.059 2.393-.291 3.374-1.272.981-.981 1.213-2.093 1.272-3.374.059-1.281.072-1.69.072-7.613 0-5.923-.013-6.332-.072-7.613-.059-1.281-.291-2.393-1.272-3.374-.981-.981-2.093-1.213-3.374-1.272C15.668.013 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                    </div>
                    <span class="mt-2 text-sm text-gray-700">Instagram</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection