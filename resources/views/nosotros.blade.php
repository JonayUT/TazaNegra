@extends('Plantillas.base')

@section('title', 'Nosotros')

@section('content')
@php
    // Datos para los círculos
    $circulos = [
        ['etiqueta' => 'Profesional', 'icono' => '🕴️'],   
        ['etiqueta' => 'Amigable', 'icono' => '👋'],        
        ['etiqueta' => 'Confiable', 'icono' => '🤝'],         
        ['etiqueta' => 'Moderna', 'icono' => '🖥️'],           
        ['etiqueta' => 'Minimalista', 'icono' => '⚪'],        
    ];

    // Datos para las cards
    $cards = [
        [
            'titulo' => 'Nuestra Historia',
            'texto1' => 'Desde 2021, Taza Negra selecciona los mejores granos.',
            'texto2' => 'Conoce más sobre nuestro <a href="#" class="text-blue-600 underline">proceso</a>.',
            'icono' => '📖',
        ],
        [
            'titulo' => 'Nuestro Café',
            'texto1' => 'Café de altura, tostado artesanalmente.',
            'texto2' => 'Descubre nuestras <a href="#" class="text-blue-600 underline">variedades</a>.',
            'icono' => '☕',
        ],
        [
            'titulo' => 'Compromiso Social',
            'texto1' => 'Apoyamos a productores locales y comercio justo.',
            'texto2' => 'Lee sobre nuestro <a href="#" class="text-blue-600 underline">impacto</a>.',
            'icono' => '🤝',
        ],
    ];
@endphp

<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Título principal -->
    <h1 class="text-4xl font-hatton font-bold text-center mb-6">Taza Negra</h1>
    <p class="font-verdana text-center text-black mb-8">
        <span class="inline-flex items-center"> Una taza de cafe no cambiara al mundo, pero es un gran comienzo.</span>
    </p>

    <!-- Circulos con texto -->
    <div class="flex flex-wrap justify-center gap-8 mb-8">
        @foreach($circulos as $c)
        <div class="flex flex-col items-center">
            <div class="w-20 h-20 rounded-full border-2 border-gray-400 flex items-center justify-center mb-2 text-3xl">
                {{ $c['icono'] }}
            </div>
            <span class="font-verdana text-sm text-black">{{ $c['etiqueta'] }}</span>
        </div>
        @endforeach
    </div>

    <!-- Cards con imagen y texto -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        @foreach($cards as $card)
        <div class="bg-black text-white font-verdana rounded-xl shadow p-4 flex flex-col items-center">
            <div class="w-full h-20 rounded mb-3 flex items-center justify-center text-4xl">
                {{ $card['icono'] }}
            </div>
            <h3 class="font-bold mb-2">{{ $card['titulo'] }}</h3>
            <p class="text-center mb-1">{!! $card['texto1'] !!}</p>
            <p class="text-center mb-1">{!! $card['texto2'] !!}</p>
        </div>
        @endforeach
    </div>

    <!-- Imagen y texto con subtítulo -->
    <div class="mt-20 flex flex-col md:flex-row items-center md:items-start mb-20 gap-12">
        <div class="w-full md:w-1/2 h-56 bg-gray-200 rounded flex items-center justify-center mb-8 md:mb-0">
            <img src="{{ asset('images/cafe.jpg') }}" alt="Cafe" class="w-full h-full object-cover" />
        </div>
        <div class="w-full md:w-1/2 text-sm/6">
            <h2 class="text-2xl font-hatton font-bold mb-2 text-center">Cafe Nayarita</h2>
            <p class="text-black mb-2 text-justify font-verdana">Cultivado por manos campesinas con tradición, paciencia y profundo respeto por la tierra, el café nayarita destaca por su sabor limpio, notas cítricas y florales, y un cuerpo suave con acidez equilibrada.</p>
            <p class="text-black mb-2 text-justify font-verdana">El café de Nayarit no solo es de alta calidad, sino que representa la resistencia, identidad y sabor auténtico de comunidades que merecen un lugar destacado en el mapa del café mexicano premium.</p>
        </div>
    </div>

    <!-- Misión, Visión, About -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 bg-black rounded mb-2 flex items-center justify-center text-2xl">🎯</div>
            <h3 class="font-semibold mb-1">Misión</h3>
            <p class="text-center text-gray-600 text-sm">Texto de misión aquí. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div>
            <div class="w-full h-32 bg-black rounded mb-2 flex items-center justify-center overflow-hidden">
                <img src="{{ asset('images/banner.png') }}" alt="Cafe" class="w-full h-full object-cover" />
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 bg-black rounded mb-2 flex items-center justify-center text-2xl">💎</div>
            <h3 class="font-semibold mb-1">Valores</h3>
            <p class="text-center text-gray-600 text-sm">Texto about aquí. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <div class="flex flex-col items-center mt-8 md:mt-4">
        <div class="w-10 h-10 bg-black rounded mb-2 flex items-center justify-center text-2xl">🌟</div>
        <h3 class="font-semibold mb-1">Visión</h3>
        <p class="text-center text-gray-600 text-sm">Texto de visión aquí. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</div>
@endsection