
@extends('Plantillas.base')
@section('title', 'Detalle del Pedido')
@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold mb-6">Detalle del Pedido #{{ $pedido->id }}</h2>
    <div class="mb-4">
        <strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}<br>
        <strong>Total:</strong> ${{ $pedido->total }}<br>
        <strong>Estado:</strong> {{ $pedido->status }}<br>
        <strong>Dirección de entrega:</strong>
        <div class="ml-4">
            {{ $pedido->address->street }}, {{ $pedido->address->number }}, {{ $pedido->address->colony }}, {{ $pedido->address->city }}, {{ $pedido->address->state }}, CP: {{ $pedido->address->zip }}, Tel: {{ $pedido->address->phone }}
        </div>
    </div>
    <h3 class="text-lg font-semibold mb-2">Productos</h3>
    <table class="w-full border mb-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-3">Producto</th>
                <th class="py-2 px-3">Cantidad</th>
                <th class="py-2 px-3">Precio</th>
                <th class="py-2 px-3">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->orderItems as $item)
            <tr class="border-t">
                <td class="py-2 px-3">{{ $item->product->name ?? 'Producto eliminado' }}</td>
                <td class="py-2 px-3">{{ $item->quantity }}</td>
                <td class="py-2 px-3">${{ $item->price }}</td>
                <td class="py-2 px-3">${{ $item->price * $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('perfil') }}" class="text-blue-600 hover:underline">Volver a mi perfil</a>
</div>
@endsection