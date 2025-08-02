@extends('Plantillas.base')

@section('title', 'Productos')

@push('styles')

    <style>
        [x-cloak] { display: none; }
    </style>
@endpush

@section('content')
    <div class="text-center flex flex-col items-center  mb-8">
        <h1 class="font-verdana text-3xl mt-12 mb-4">
            Bienvenido a los productos de <strong>Taza Negra</strong>
        </h1>
        <br>
        Explora nuestros productos y descubre el sabor auténtico de Taza Negra.
        <br>
    </div>

    <!-- Cards de productos -->
    <div class="w-[90vw] max-w-5xl mx-auto">
        @include('Productos.cardsProductos')
    </div>
@endsection
