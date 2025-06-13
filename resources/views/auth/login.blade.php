
@extends('Plantillas.base')
@section('title', 'Iniciar Sesión')
@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded shadow max-w-sm w-full">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>
        <input name="email" type="email" placeholder="Correo" required class="mb-3 w-full border rounded px-3 py-2" />
        <input name="password" type="password" placeholder="Contraseña" required class="mb-3 w-full border rounded px-3 py-2" />
        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded font-semibold mb-2">Entrar</button>
        <div class="flex justify-between text-sm">
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Registrarse</a>
           
        </div>
    </form>
</div>
@endsection