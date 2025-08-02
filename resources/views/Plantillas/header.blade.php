<nav class="bg-black shadow" x-data="{ open: false }">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ url('/') }}" class="font-hatton font-semibold text-2xl text-white">Taza Negra</a>
        <button class="md:hidden text-gray-700 focus:outline-none" @click="open = !open">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <div class="hidden md:flex space-x-6 items-center font-hatton">
            <a href="{{ url('/') }}" class="text-white font-medium">Inicio</a>
            <a href="{{ url('/nosotros') }}" class="text-white font-medium">Nosotros</a>
            <a href="{{ url('/productos') }}" class="text-white font-medium">Productos</a>
            <a href="{{ url('/news') }}" class="text-white font-medium">News</a>
            <a href="{{ url('/contacto') }}" class="text-white font-medium">Contacto</a>
            @guest
                <a href="{{ route('login') }}" class="text-white font-medium">Login</a>
                <a href="{{ route('register') }}" class="text-white font-medium">Registro</a>
            @else
                @if(Auth::user()->role_id == 1)
                    <a href="{{ route('admin.usuarios.index') }}" class="text-white font-medium">Panel Usuarios</a>
                    <a href="{{ route('admin.pedidos') }}" class="text-white font-medium">Panel Pedidos</a>
                @endif
                <a href="{{ url('/perfil') }}" class="text-white font-medium">Perfil</a>
                <a href="{{ route('cart') }}" class="text-white font-medium">Carrito</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white font-medium">Salir</button>
                </form>
            @endguest
        </div>
    </div>
    <!-- Menú móvil con animación -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="md:hidden bg-black px-4 pb-4 text-center text-sm font-hatton"
    >
        <a href="{{ url('/') }}" class="block py-2 text-white">Inicio</a>
        <a href="{{ url('/nosotros') }}" class="block py-2 text-white">Nosotros</a>
        <a href="{{ url('/productos') }}" class="block py-2 text-white">Productos</a>
        <a href="{{ url('/news') }}" class="block py-2 text-white">News</a>
        <a href="{{ url('/contacto') }}" class="block py-2 text-white">Contacto</a>
        @guest
            <a href="{{ route('login') }}" class="block py-2 text-white">Login</a>
            <a href="{{ route('register') }}" class="block py-2 text-white">Registro</a>
        @else
            @if(Auth::user()->role_id == 1)
                <a href="{{ route('admin.usuarios.index') }}" class="block py-2 text-purple-700 hover:text-black">Panel Usuarios</a>
                <a href="{{ route('admin.pedidos') }}" class="block py-2 text-purple-700 hover:text-black">Panel Pedidos</a>
            @endif
            <a href="{{ url('/perfil') }}" class="block py-2 text-white">Perfil</a>
            <a href="{{ route('cart') }}" class="block py-2 text-white">Carrito</a>
            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <button type="submit" class="w-full text-left py-2 text-white">Salir</button>
            </form>
        @endguest
    </div>
</nav>