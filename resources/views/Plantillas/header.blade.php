<nav class="bg-white shadow" x-data="{ open: false }">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ url('/') }}" class="font-bold text-xl text-gray-800">Taza Negra</a>
        <button class="md:hidden text-gray-700 focus:outline-none" @click="open = !open">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <div class="hidden md:flex space-x-6 items-center">
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-black">Inicio</a>
            <a href="{{ url('/nosotros') }}" class="text-gray-700 hover:text-black">Nosotros</a>
            <a href="{{ url('/productos') }}" class="text-gray-700 hover:text-black">Productos</a>
            <a href="{{ url('/news') }}" class="text-gray-700 hover:text-black">News</a>
            <a href="{{ url('/contacto') }}" class="text-gray-700 hover:text-black">Contacto</a>
            @guest
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-black">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-black">Registro</a>
            @else
                @if(Auth::user()->role_id == 1)
                    <a href="{{ route('admin.usuarios.index') }}" class="text-purple-700 hover:text-black">Panel Usuarios</a>
                    <a href="{{ route('admin.pedidos') }}" class="text-purple-700 hover:text-black">Panel Pedidos</a>
                @endif
                <a href="{{ url('/perfil') }}" class="text-gray-700 hover:text-black">Perfil</a>
                <a href="{{ route('cart') }}" class="text-gray-700 hover:text-black">Carrito</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-black ml-2">Salir</button>
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
        class="md:hidden bg-white px-4 pb-4"
    >
        <a href="{{ url('/') }}" class="block py-2 text-gray-700 hover:text-black">Inicio</a>
        <a href="{{ url('/nosotros') }}" class="block py-2 text-gray-700 hover:text-black">Nosotros</a>
        <a href="{{ url('/productos') }}" class="block py-2 text-gray-700 hover:text-black">Productos</a>
        <a href="{{ url('/news') }}" class="block py-2 text-gray-700 hover:text-black">News</a>
        <a href="{{ url('/contacto') }}" class="block py-2 text-gray-700 hover:text-black">Contacto</a>
        @guest
            <a href="{{ route('login') }}" class="block py-2 text-gray-700 hover:text-black">Login</a>
            <a href="{{ route('register') }}" class="block py-2 text-gray-700 hover:text-black">Registro</a>
        @else
            @if(Auth::user()->role_id == 1)
                <a href="{{ route('admin.usuarios.index') }}" class="block py-2 text-purple-700 hover:text-black">Panel Usuarios</a>
                <a href="{{ route('admin.pedidos') }}" class="block py-2 text-purple-700 hover:text-black">Panel Pedidos</a>
            @endif
            <a href="{{ url('/perfil') }}" class="block py-2 text-gray-700 hover:text-black">Perfil</a>
            <a href="{{ route('cart') }}" class="block py-2 text-gray-700 hover:text-black">Carrito</a>
            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <button type="submit" class="w-full text-left py-2 text-gray-700 hover:text-black">Salir</button>
            </form>
        @endguest
    </div>
</nav>