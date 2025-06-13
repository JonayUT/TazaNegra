@extends('Plantillas.base')
@section('title', 'Registro')
@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <form method="POST" action="{{ route('register') }}" class="bg-white p-8 rounded shadow max-w-sm w-full">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input name="nombre" type="text" placeholder="Nombre" required class="mb-3 w-full border rounded px-3 py-2" />
        <input name="email" type="email" placeholder="Correo" required class="mb-3 w-full border rounded px-3 py-2" />
        <input type="telefono" name="telefono" placeholder="Teléfono" required class="mb-3 w-full border rounded px-3 py-2" />
        <input name="password" type="password" placeholder="Contraseña" required class="mb-3 w-full border rounded px-3 py-2" />
        <input name="password_confirmation" type="password" placeholder="Confirmar contraseña" required class="mb-3 w-full border rounded px-3 py-2" />
        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded font-semibold">Registrarse</button>
        <div class="text-sm mt-2 text-center">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Inicia sesión</a>
        </div>
    </form>
</div>
@endsection