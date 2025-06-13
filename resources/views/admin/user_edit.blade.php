
@extends('Plantillas.base')
@section('title', 'Editar Usuario')
@section('content')
<div class="max-w-lg mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Editar Usuario</h2>
    <form method="POST" action="{{ route('admin.usuarios.update', $usuario) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Nombre</label>
            <input name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Correo</label>
            <input name="email" type="email" value="{{ old('email', $usuario->email) }}" required class="w-full border rounded px-3 py-2">
        </div>
         <div class="mb-4">
            <label class="block mb-1">Telefono</label>
            <input name="telefono" value="{{ old('telefono', $usuario->telefono) }}" required class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Rol</label>
            <select name="role_id" class="w-full border rounded px-3 py-2">
                @foreach(\App\Models\Role::all() as $role)
                    <option value="{{ $role->id }}" @if($usuario->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('admin.usuarios.index') }}" class="ml-4 text-blue-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection