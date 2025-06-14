@extends('Plantillas.base')
@section('title', 'Mi Perfil')
@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Mi Perfil</h1>
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Perfil -->
        <div class="md:w-1/3 flex flex-col items-center">
            <img src="{{ Auth::user()->foto_url ?? asset('img/default-profile.png') }}" alt="Foto de perfil" class="w-32 h-32 rounded-full object-cover mb-4 border">
            <h2 class="text-xl font-semibold">{{ Auth::user()->nombre }}</h2>
            <p class="text-gray-600">{{ Auth::user()->email }}</p>
            <p class="text-gray-600">{{ Auth::user()->telefono }}</p>
            <a href="{{ route('perfil.editar') }}" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Editar Perfil</a>
        </div>
        <!-- Info y acciones -->
        <div class="md:w-2/3">
            <!-- Direcciones -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-semibold">Direcciones registradas</h3>
                    <a href="{{ route('perfil.direccion.nueva') }}" class="text-green-600 hover:underline">Agregar nueva dirección</a>
                </div>
                @if(Auth::user()->addresses->count())
                    <ul class="space-y-2">
                        @foreach(Auth::user()->addresses as $dir)
                            <li class="border rounded px-3 py-2 flex justify-between items-center">
                                <span>
                                    {{ $dir->calle }}, {{ $dir->numero }}, {{ $dir->colonia }}, {{ $dir->ciudad }}, {{ $dir->estado }}, CP: {{ $dir->cp }}
                                </span>
                                <form action="{{ route('perfil.direccion.eliminar', $dir) }}" method="POST" onsubmit="return confirm('¿Eliminar dirección?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline ml-2">Eliminar</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No tienes direcciones registradas.</p>
                @endif
            </div>
            <!-- Historial de pedidos -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Historial de pedidos</h3>
                @if(Auth::user()->orders->count())
                    <table class="w-full border mb-4">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 text-center">ID</th>
                                <th class="py-2 text-center">Fecha</th>
                                <th class="py-2 text-center">Total</th>
                                <th class="py-2 text-center">Estado</th>
                                <th class="py-2 text-center">Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->orders as $pedido)
                            <tr class="border-t">
                                <td class="py-2 text-center">{{ $pedido->id }}</td>
                                <td class="py-2 text-center">{{ $pedido->created_at->format('d/m/Y') }}</td>
                                <td class="py-2 text-center">${{ number_format($pedido->total, 2) }}</td>
                                <td class="py-2 text-center">{{ $pedido->estadoRelacion->nombre ?? 'Sin estado' }}</td>
                                <td class="py-2 text-center">
                                    <a href="{{ route('perfil.pedido.ver', $pedido->id) }}" class="text-blue-600 hover:underline">Detalles</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No tienes pedidos realizados.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection