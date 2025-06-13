
@extends('Plantillas.base')
@section('title', 'Detalle de Usuario')
@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Usuario: {{ $usuario->nombre }}</h2>
    <div class="mb-6">
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Rol:</strong> {{ $usuario->role->name ?? 'Usuario' }}</p>
        <p><strong>Telefono:</strong> {{ $usuario->telefono}}</p>
    </div>
    <h3 class="text-xl font-semibold mb-2">Direcciones</h3>
    <ul class="mb-6">
        @forelse($addresses as $dir)
            <li class="mb-1">{{ $dir->calle }}, {{ $dir->numero }}, {{ $dir->colonia }}, {{ $dir->ciudad }}, {{ $dir->estado }}, CP: {{ $dir->cp }}</li>
        @empty
            <li class="text-gray-500">Sin direcciones registradas.</li>
        @endforelse
    </ul>
    <h3 class="text-xl font-semibold mb-2">Historial de Pedidos</h3>
    <table class="w-full border mb-6">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-3">ID</th>
                <th class="py-2 px-3">Fecha</th>
                <th class="py-2 px-3">Total</th>
                <th class="py-2 px-3">Estado</th>
                <th class="py-2 px-3">Productos</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr class="border-t">
                <td class="py-2 px-3">{{ $order->id }}</td>
                <td class="py-2 px-3">{{ $order->created_at->format('d/m/Y') }}</td>
                <td class="py-2 px-3">${{ $order->total }}</td>
                <td class="py-2 px-3">{{ $order->status }}</td>
                <td class="py-2 px-3">
                    <ul>
                        @foreach($order->orderItems as $item)
                            <li>{{ $item->product->name ?? 'Producto eliminado' }} x{{ $item->quantity }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-gray-500 text-center py-2">Sin pedidos.</td></tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('admin.usuarios.index') }}" class="text-blue-600 hover:underline">Volver al listado</a>
</div>
@endsection