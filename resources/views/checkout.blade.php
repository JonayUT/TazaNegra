@extends('Plantillas.base')
@section('title', 'Checkout')
@section('content')
<div class="max-w-2xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Resumen de compra</h1>

    @php
        $cart = session('cart', []);
        $totalGeneral = 0;
        foreach($cart as $item) {
            $totalGeneral += $item['precio'] * $item['cantidad'];
        }
        $direcciones = Auth::user()->addresses ?? [];
    @endphp

    @if(count($cart) > 0)
        <form method="POST" action="{{ route('checkout.simular') }}">
            @csrf
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Productos</h2>
                <ul class="mb-2">
                    @foreach($cart as $item)
                        <li class="mb-1">
                            <span class="font-semibold">{{ $item['nombre'] }}</span>
                            x{{ $item['cantidad'] }} - ${{ $item['precio'] * $item['cantidad'] }}
                        </li>
                    @endforeach
                </ul>
                <div class="font-bold text-right">Total: ${{ $totalGeneral }}</div>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Selecciona una dirección de entrega</h2>
                @if(count($direcciones) > 0)
                    <select name="direccion_id" required class="w-full border rounded px-3 py-2 mb-2">
                        <option value="">-- Selecciona una dirección --</option>
                        @foreach($direcciones as $dir)
                            <option value="{{ $dir->id }}">
                                {{ $dir->calle }}, {{ $dir->numero }}, {{ $dir->colonia }}, {{ $dir->ciudad }}, {{ $dir->estado }}, CP: {{ $dir->cp }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <p class="text-red-600 mb-2">No tienes direcciones registradas.</p>
                @endif
                <a href="{{ route('perfil.direccion.nueva') }}" class="text-green-600 hover:underline">Agregar nueva dirección</a>
            </div>

            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded font-semibold"
                @if(count($direcciones) == 0) disabled @endif
            >Simular compra</button>
        </form>
    @else
        <p class="text-gray-600">Tu carrito está vacío.</p>
    @endif
</div>
@endsection