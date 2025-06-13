@extends('Plantillas.base')
@section('title', 'Carrito de Compras')
@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Carrito de Compras</h1>
    @if(session('cart') && count(session('cart')) > 0)
        <table class="w-full mb-6">
            <thead>
                <tr class="text-left border-b">
                    <th class="py-2">Producto</th>
                    <th class="py-2">Cantidad</th>
                    <th class="py-2">Precio</th>
                    <th class="py-2">Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $totalGeneral = 0; @endphp
                @foreach(session('cart', []) as $item)
                @php $subtotal = $item['precio'] * $item['cantidad']; $totalGeneral += $subtotal; @endphp
                <tr class="border-b">
                    <td class="py-2">{{ $item['nombre'] }}</td>
                    <td class="py-2">{{ $item['cantidad'] }}</td>
                    <td class="py-2">${{ $item['precio'] }}</td>
                    <td class="py-2">${{ $subtotal }}</td>
                    <td class="py-2">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-end mb-4">
            <span class="text-xl font-bold">Total a pagar: ${{ $totalGeneral }}</span>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('checkout') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded font-semibold">Finalizar compra</a>
        </div>
    @else
        <p class="text-gray-600">Tu carrito está vacío.</p>
    @endif
</div>
@endsection