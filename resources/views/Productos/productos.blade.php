@extends('Plantillas.base')

@section('title', 'Productos')

@push('styles')

    <style>
        [x-cloak] { display: none; }
    </style>
@endpush

@section('content')
    <h1>Bienvenido a los productos de <strong>Taza Negra</strong></h1><br><br>
    
    
    <!-- Cards de productos -->
    <div class="w-[90vw] max-w-5xl mx-auto">
        @include('Productos.cardsProductos')
    </div>
@endsection
