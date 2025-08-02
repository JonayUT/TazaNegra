
@extends('Plantillas.base')

@section('title', 'Inicio')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Hero principal -->
    <div class="w-full h-64 md:h-96 bg-gray-200 rounded-xl mb-12 flex items-center justify-center overflow-hidden">
        <img src="{{ asset('images/banner.png') }}" alt="Banner" class="w-full h-full object-cover rounded-xl" />
    </div>

    <!-- Top Coffee Drinks -->
    <h2 class="text-4xl font-hatton font-semibold text-center mb-10">Top Coffee Drinks</h2>
    <div class="font-verdana text-base text-center text-black mb-14 md:mb-18 px-2 md:px-0">
        En Taza Negra por Carvajal Rodriguez, creemos que el mejor café no solo se toma, se vive.<br>
        Por eso, queremos inspirarte a disfrutar cada taza con estas deliciosas bebidas,<br>
        las cuales resaltan el sabor auténtico, aromático y equilibrado de nuestro café.<br>
        Ya sea para un desayuno en familia, una pausa merecida o una reunión entre amigos, estas son nuestras favoritas:
    </div>

    <div class="flex flex-col md:flex-row items-center justify-center gap-8">
        <div x-data="{ tab: 0 }" class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-5xl mx-auto px-4 py-8">
        <!-- Contenedor principal -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full">
            <!-- Imagen dinámica de la bebida -->
            <div class="w-64 h-64 sm:w-72 sm:h-72 bg-gray-200 rounded-xl flex items-center justify-center overflow-hidden mb-6 md:mb-0 transition-all duration-300">
                <img x-show="tab === 0" src="{{ asset('images/expresso.jpg') }}" alt="Expresso" class="w-full h-full object-cover rounded-xl" />
                <img x-show="tab === 1" src="{{ asset('images/americano.jpg') }}" alt="Americano" class="w-full h-full object-cover rounded-xl" />
                <img x-show="tab === 2" src="{{ asset('images/capuccino.jpg') }}" alt="Capuccino" class="w-full h-full object-cover rounded-xl" />
            </div>

            <!-- Tabs y contenido -->
            <div class="w-full max-w-md bg-white border border-gray-300 rounded-lg shadow-sm flex flex-col">
                <!-- Pestañas -->
                <div class="flex border-b border-gray-300 overflow-x-auto font-hatton text-black">
                    <button 
                        @click="tab = 0" 
                        :class="tab === 0 ? 'bg-white text-black border-b-2 border-black' : 'bg-black text-white'" 
                        class="px-3 py-2 sm:px-4 sm:py-3 text-sm sm:text-base font-medium whitespace-nowrap flex-1 focus:outline-none transition-colors"
                    >
                        Expresso
                    </button>
                    <button 
                        @click="tab = 1" 
                        :class="tab === 1 ? 'bg-white text-black border-b-2 border-black' : 'bg-black text-white'" 
                        class="px-3 py-2 sm:px-4 sm:py-3 text-sm sm:text-base font-medium whitespace-nowrap flex-1 focus:outline-none transition-colors"
                    >
                        Americano
                    </button>
                    <button 
                        @click="tab = 2" 
                        :class="tab === 2 ? 'bg-white text-black border-b-2 border-black' : 'bg-black text-white'" 
                        class="px-3 py-2 sm:px-4 sm:py-3 text-sm sm:text-base font-medium whitespace-nowrap flex-1 focus:outline-none transition-colors"
                    >
                        Capuccino
                    </button>
                </div>

                <!-- Contenido de cada tab -->
                <div class="p-4 sm:p-5 font-verdana text-black text-sm sm:text-base leading-relaxed text-justify">
                    <!-- Expresso -->
                    <div x-show="tab === 0" x-cloak class="min-h-[100px] sm:min-h-[120px] transition-opacity duration-200">
                        <p class="mb-1 text-center font-bold">Un shot corto, denso y lleno de sabor.</p>
                        <p class="text-justify">Nuestro café molido fino destila un espresso con cuerpo, crema dorada y un aroma que llena la cocina. ¿Lo mejor? Es la base de muchas otras delicias… ¡simplemente una explosión de energía que despierta el alma!</p>
                    </div>

                    <!-- Americano -->
                    <div x-show="tab === 1" x-cloak class="min-h-[100px] sm:min-h-[120px] transition-opacity duration-200">
                        <p class="mb-1 text-center font-bold">El clásico que nunca falla.</p>
                        <p class="text-justify">Un espresso potente al que se le añade agua caliente, resultando en una taza larga, limpia y con todo el carácter de nuestro café, pero más suave y fácil de saborear. Ideal para quienes aman el sabor intenso sin tanta densidad.</p>
                    </div>

                    <!-- Capuccino -->
                    <div x-show="tab === 2" x-cloak class="min-h-[100px] sm:min-h-[120px] transition-opacity duration-200">
                        <p class="mb-1 text-center font-bold">Un abrazo en taza.</p>
                        <p class="text-justify">Un espresso fuerte cubierto con leche vaporizada y una generosa capa de espuma sedosa. Espolvorea un poco de cacao en polvo o canela, y tendrás una bebida: cálida, reconfortante y perfecta para las mañanas de invierno.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection