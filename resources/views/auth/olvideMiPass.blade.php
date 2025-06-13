
@extends('Plantillas.base')
@section('title', 'Recuperar Contraseña')
@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <form method="POST" action="{{ route('olvideMiPass') }}" class="bg-white p-8 rounded shadow max-w-sm w-full">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center">Recuperar Contraseña</h2>
        <input name="email" type="email" placeholder="Correo" required class="mb-3 w-full border rounded px-3 py-2" />
        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded font-semibold">Enviar enlace</button>
        <div class="text-sm mt-2 text-center">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Volver al login</a>
        </div>
    </form>
</div>
@endsection