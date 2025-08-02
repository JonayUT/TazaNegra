
@extends('Plantillas.base')
@section('title', 'Iniciar Sesión')
@section('content')
<div class="flex justify-center items-center min-h-[70vh] px-2">
    <form method="POST" action="{{ route('login') }}" class="bg-black p-8 rounded-xl shadow max-w-sm w-full">
        @csrf
        <h2 class="text-2xl font-bold font-hatton text-white mb-6 text-center">Iniciar Sesión</h2>
        <input name="email" type="email" placeholder="Correo" required class="mb-3 w-full border rounded px-3 py-2" />
        <input name="password" type="password" placeholder="Contraseña" required class="mb-3 w-full border rounded px-3 py-2" />
        <button class="w-full bg-slate-600 hover:bg-slate-700 text-white py-2 rounded font-semibold text-lg mb-2">Entrar</button>
        <div class="flex justify-between text-sm">
            <a href="{{ route('register') }}" class="text-white text-base hover:underline">Registrarse</a>
        </div>
    </form>
</div>
@endsection