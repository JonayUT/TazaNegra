@extends('Plantillas.base')
@section('title', 'Panel de Usuarios')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Usuarios registrados</h1>
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-3">ID</th>
                <th class="py-2 px-3">Nombre</th>
                <th class="py-2 px-3">Correo</th>
                <th class="py-2 px-3">Rol</th>
                <th class="py-2 px-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario): ?>
            <tr class="border-t">
                <td class="py-2 px-3">{{ $usuario->id }}</td>
                <td class="py-2 px-3">
                    <a href="{{ route('admin.usuarios.show', $usuario) }}" class="text-green-700 hover:underline">
                        {{ $usuario->nombre }}
                    </a>
                </td>
                <td class="py-2 px-3">{{ $usuario->email }}</td>
                <td class="py-2 px-3">{{ $usuario->role->name ?? 'Usuario' }}</td>
                <td class="py-2 px-3 flex gap-2">
                    <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="text-blue-600 hover:underline">Editar</a>
                    <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" onsubmit="return confirm('¿Eliminar usuario?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ml-2">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
@endsection