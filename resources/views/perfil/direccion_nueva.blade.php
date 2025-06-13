
@extends('Plantillas.base')
@section('title', 'Nueva Dirección')
@section('content')
<div class="max-w-lg mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold mb-6">Agregar Nueva Dirección</h2>
    <form method="POST" action="{{ route('perfil.direccion.guardar') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Calle</label>
            <input name="calle" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Número</label>
            <input name="numero" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Colonia</label>
            <input name="colonia" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Ciudad</label>
            <input name="ciudad" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Estado</label>
            <input name="estado" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Código Postal</label>
            <input name="cp" required class="w-full border rounded px-3 py-2">
        </div>
        
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('perfil') }}" class="ml-4 text-blue-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection