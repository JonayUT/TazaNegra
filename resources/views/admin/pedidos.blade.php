@extends('Plantillas.base')
@section('title', 'Pedidos Pendientes')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Pedidos Pendientes</h1>
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-3">ID</th>
                <th class="py-2 px-3">Cliente</th>
                <th class="py-2 px-3">Fecha</th>
                <th class="py-2 px-3">Total</th>
                <th class="py-2 px-3">Estado</th>
                <th class="py-2 px-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-t">
                <td class="py-2 px-3">{{ $order->id }}</td>
                <td class="py-2 px-3">{{ $order->user->name ?? $order->user->nombre }}</td>
                <td class="py-2 px-3">{{ $order->created_at->format('d/m/Y') }}</td>
                <td class="py-2 px-3">${{ $order->total }}</td>
                <td class="py-2 px-3">{{ $order->status }}</td>
                <td class="py-2 px-3">
                    <a href="#" class="text-blue-600 hover:underline">Ver</a>
                    <a href="#" class="text-green-600 hover:underline ml-2">Marcar como enviado</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection