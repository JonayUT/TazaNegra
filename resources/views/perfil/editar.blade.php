
@extends('Plantillas.base')
@section('title', 'Editar Perfil')
@section('content')
<div class="max-w-lg mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold mb-6">Editar Perfil</h2>
    <form method="POST" action="{{ route('perfil.update') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Nombre</label>
            <input name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Correo</label>
            <input name="email" type="email" value="{{ old('email', $usuario->email) }}" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Foto de perfil (URL)</label>
            <input name="foto_url" type="url" value="{{ old('foto_url', $usuario->foto_url) }}" class="w-full border rounded px-3 py-2">
        </div>
         <div class="mb-4">
            <label class="block mb-1">Telefono</label>
            <input name="telefono" value="{{ old('telefono', $usuario->telefono) }}" required class="w-full border rounded px-3 py-2">
        </div>
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('perfil') }}" class="ml-4 text-blue-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection