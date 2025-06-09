@extends('Plantillas.base')

@section('title', 'Nosotros')

@section('content')
@php
    // Datos para los círculos
    $circulos = [
        ['etiqueta' => 'Origen', 'icono' => '🌱'],
        ['etiqueta' => 'Calidad', 'icono' => '⭐'],
        ['etiqueta' => 'Sabor', 'icono' => '☕'],
        ['etiqueta' => 'Tradición', 'icono' => '🏆'],
        ['etiqueta' => 'Sustentable', 'icono' => '🌎'],
    ];

    // Datos para las cards
    $cards = [
        [
            'titulo' => 'Nuestra Historia',
            'texto1' => 'Desde 1990, Taza Negra selecciona los mejores granos.',
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
    <h1 class="text-4xl font-bold text-center mb-2">Taza Negra</h1>
    <p class="text-center text-gray-600 mb-1">
        Un párrafo de texto con un enlace no asignado.
    </p>
    <p class="text-center text-gray-600 mb-1">
        Una segunda línea de texto con un enlace web.
    </p>
    <p class="text-center text-gray-600 mb-6">
        <span class="inline-flex items-center"> Un icono inline con texto.</span>
    </p>

    <!-- Circulos con texto -->
    <div class="flex flex-wrap justify-center gap-8 mb-8">
        @foreach($circulos as $c)
        <div class="flex flex-col items-center">
            <div class="w-20 h-20 rounded-full border-2 border-gray-400 flex items-center justify-center mb-2 text-3xl">
                {{ $c['icono'] }}
            </div>
            <span class="text-xs text-gray-500">{{ $c['etiqueta'] }}</span>
        </div>
        @endforeach
    </div>

    <!-- Cards con imagen y texto -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        @foreach($cards as $card)
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <div class="w-full h-40 bg-gray-200 rounded mb-3 flex items-center justify-center text-4xl">
                {{ $card['icono'] }}
            </div>
            <h3 class="font-semibold mb-2">{{ $card['titulo'] }}</h3>
            <p class="text-center text-gray-700 mb-1">{!! $card['texto1'] !!}</p>
            <p class="text-center text-gray-700 mb-1">{!! $card['texto2'] !!}</p>
        </div>
        @endforeach
    </div>

    <!-- Imagen y texto con subtítulo -->
    <div class="flex flex-col md:flex-row items-center md:items-start mb-12 gap-8">
        <div class="w-full md:w-1/2 h-56 bg-gray-200 rounded flex items-center justify-center mb-4 md:mb-0"></div>
        <div class="w-full md:w-1/2">
            <h2 class="text-2xl font-semibold mb-2">Un Subtítulo</h2>
            <p class="text-gray-700 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod, urna eu tincidunt consectetur, nisi nisl aliquam nunc, eget aliquam massa nisi nec erat.</p>
            <p class="text-gray-700 mb-2">Sed euismod, urna eu tincidunt consectetur, nisi nisl aliquam nunc, eget aliquam massa nisi nec erat. Etiam euismod, urna eu tincidunt consectetur.</p>
        </div>
    </div>

    <!-- Misión, Visión, About -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 bg-gray-300 rounded mb-2"></div>
            <h3 class="font-semibold mb-1">Misión</h3>
            <p class="text-center text-gray-600 text-sm">Texto de misión aquí. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div>
            <div class="w-full h-32 bg-gray-200 rounded mb-2 flex items-center justify-center"></div>
        </div>
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 bg-gray-300 rounded mb-2"></div>
            <h3 class="font-semibold mb-1">Valores</h3>
            <p class="text-center text-gray-600 text-sm">Texto about aquí. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <div class="flex flex-col items-center mt-8 md:mt-4">
        <div class="w-10 h-10 bg-gray-300 rounded mb-2"></div>
        <h3 class="font-semibold mb-1">Visión</h3>
        <p class="text-center text-gray-600 text-sm">Texto de visión aquí. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</div>
@endsection