{{-- filepath: resources/views/admin/order_detalle.blade.php --}}
@extends('Plantillas.base')
@section('title', 'Detalle del Pedido')
@section('content')
<div class="max-w-2xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Detalle del Pedido #{{ $order->id }}</h1>

    <div class="mb-4 text-gray-600">
        Fecha del pedido: {{ $order->created_at->format('d/m/Y H:i') }}
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2">Usuario</h2>
        <div>
            {{ $order->user->nombre ?? 'Usuario eliminado' }}<br>
            Teléfono: {{ $order->user->telefono }}<br>
            Email: {{ $order->user->email ?? '' }}<br>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2">Productos</h2>
        <ul class="mb-2">
            @foreach($order->orderItems as $item)
                <li>
                    <span class="font-semibold">{{ $item->nombre }}</span>
                    x{{ $item->cantidad }} - ${{ $item->precio * $item->cantidad }}
                </li>
            @endforeach
        </ul>
        <div class="font-bold text-right">Total: ${{ $order->total }}</div>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2">Dirección de entrega</h2>
        <div>
            {{ $order->address->calle ?? '' }}, {{ $order->address->numero ?? '' }}, {{ $order->address->colonia ?? '' }},
            {{ $order->address->ciudad ?? '' }}, {{ $order->address->estado ?? '' }}, CP: {{ $order->address->cp ?? '' }}
        </div>
    </div>

    <div class="mb-6">
        <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded">
            Estado: {{ $order->estadoRelacion->nombre ?? 'Sin estado' }}
        </span>
    </div>
    <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline">Volver</a>
</div>
@endsection