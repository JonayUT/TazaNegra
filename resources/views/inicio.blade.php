
@extends('Plantillas.base')

@section('title', 'Inicio')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Hero principal -->
    <div class="w-full h-64 md:h-96 bg-gray-200 rounded-xl mb-12 flex items-center justify-center">
        <!-- Aquí podría ir una imagen de fondo o slider -->
        <span class="text-3xl text-gray-400 font-bold">Imagen principal / Banner</span>
    </div>

    <!-- Top Coffee Drinks -->
    <h2 class="text-4xl font-bold text-center mb-8">Top Coffee Drinks</h2>
    <div class="flex flex-col md:flex-row items-center justify-center gap-8">
        <!-- Imagen de la bebida -->
        <div class="w-64 h-64 bg-gray-200 rounded-xl flex items-center justify-center mb-6 md:mb-0">
            <span class="bg-gray-300 px-4 py-1 rounded-full text-gray-700 font-semibold">Drink</span>
        </div>
        <!-- Tabs y contenido -->
        <div x-data="{ tab: 0 }" class="w-full max-w-md">
            <!-- Tabs -->
            <div class="flex space-x-2 mb-2">
                <button @click="tab = 0" :class="tab === 0 ? 'bg-gray-300' : 'bg-gray-100'" class="px-4 py-1 rounded-t-md border border-b-0 border-gray-300 font-semibold focus:outline-none">Expresso</button>
                <button @click="tab = 1" :class="tab === 1 ? 'bg-gray-300' : 'bg-gray-100'" class="px-4 py-1 rounded-t-md border border-b-0 border-gray-300 font-semibold focus:outline-none">Americano</button>
                <button @click="tab = 2" :class="tab === 2 ? 'bg-gray-300' : 'bg-gray-100'" class="px-4 py-1 rounded-t-md border border-b-0 border-gray-300 font-semibold focus:outline-none">Capuccino</button>
            </div>
            <!-- Contenido de cada tab -->
            <div class="border border-gray-300 rounded-b-md bg-white p-4 min-h-[140px]">
                <div x-show="tab === 0" x-cloak class="min-h-[140px]">
                    <p class="mb-1"><span class="font-bold">Expresso:</span> <span class="text-red-500">Intenso</span> y aromático, la base de todo gran café.</p>
                    <p class="mb-1">Un <span class="font-bold">paragraph</span> of <span class="text-red-500">text</span> with an <a href="#" class="text-blue-600 underline">unassigned link</a>.</p>
                    <p class="mb-1">A <span class="font-semibold">second row</span> of text with a <a href="#" class="text-blue-600 underline">web link</a>.</p>
                    <span class="inline-flex items-center text-gray-700 text-sm">
                        <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"></circle><path d="M12 16v-4M12 8h.01" stroke-width="2"></path></svg>
                        An icon inline with text.
                    </span>
                </div>
                <div x-show="tab === 1" x-cloak class="min-h-[140px]">
                    <p class="mb-1"><span class="font-bold">Americano:</span> Suave, ligero y perfecto para cualquier momento del día.</p>
                    <p class="mb-1">Un <span class="font-bold">paragraph</span> of <span class="text-red-500">text</span> with an <a href="#" class="text-blue-600 underline">unassigned link</a>.</p>
                    <p class="mb-1">A <span class="font-semibold">second row</span> of text with a <a href="#" class="text-blue-600 underline">web link</a>.</p>
                    <span class="inline-flex items-center text-gray-700 text-sm">
                        <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"></circle><path d="M12 16v-4M12 8h.01" stroke-width="2"></path></svg>
                        An icon inline with text.
                    </span>
                </div>
                <div x-show="tab === 2" x-cloak class="min-h-[140px]">
                    <p class="mb-1"><span class="font-bold">Capuccino:</span> Cremoso, con espuma de leche y un toque dulce.</p>
                    <p class="mb-1">Un <span class="font-bold">paragraph</span> of <span class="text-red-500">text</span> with an <a href="#" class="text-blue-600 underline">unassigned link</a>.</p>
                    <p class="mb-1">A <span class="font-semibold">second row</span> of text with a <a href="#" class="text-blue-600 underline">web link</a>.</p>
                    <span class="inline-flex items-center text-gray-700 text-sm">
                        <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"></circle><path d="M12 16v-4M12 8h.01" stroke-width="2"></path></svg>
                        An icon inline with text.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection