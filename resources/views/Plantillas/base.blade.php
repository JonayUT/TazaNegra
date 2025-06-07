
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Taza Negra')</title>
    <!-- Tailwind CSS (CDN para desarrollo, instala para producción) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    @include('Plantillas.header')

    <main class="flex-1 container mx-auto py-4">
        @yield('content')
    </main>

    @include('Plantillas.footer')

    @stack('scripts')
</body>
</html>