@extends('Plantillas.base')
@section('title', 'Compra realizada')
@section('content')
<div class="max-w-2xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6 text-green-700">¡Compra simulada con éxito!</h1>
    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2">Resumen del pedido</h2>
        <ul class="mb-2">
            @foreach($pedido->orderItems as $item)
                <li>
                    <span class="font-semibold">{{ $item->nombre }}</span>
                    x{{ $item->cantidad }} - ${{ $item->precio * $item->cantidad }}
                </li>
            @endforeach
        </ul>
        <div class="font-bold text-right">Total: ${{ $pedido->total }}</div>
    </div>
    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2">Dirección de entrega</h2>
        <div>
            {{ $pedido->address->calle }}, {{ $pedido->address->numero }}, {{ $pedido->address->colonia }},
            {{ $pedido->address->ciudad }}, {{ $pedido->address->estado }}, CP: {{ $pedido->address->cp }},
        </div>
    </div>
    <div class="mb-6">
        <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded">
            Estado: {{ $pedido->estadoRelacion->nombre ?? 'Sin estado' }}
        </span>
    </div>
    <a href="{{ route('perfil') }}" class="text-blue-600 hover:underline">Ir a mi perfil</a>
</div>
@endsection