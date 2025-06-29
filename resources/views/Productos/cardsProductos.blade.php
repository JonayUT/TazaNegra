<div 
    x-data="{
        productos: [
            {
                ids: [1, 2, 4], // IDs reales por gramaje
                nombre: 'Cafe En Grano Taza Negra',
                descripcion: 'Nuestro café en grano conserva toda su frescura y aroma, ideal para quienes buscan una experiencia de molienda y sabor inigualable en cada taza.',
                imagenes: [
                    'https://via.placeholder.com/250x250?text=Producto+1+100g',
                    'https://via.placeholder.com/250x250?text=Producto+1+250g',
                    'https://via.placeholder.com/250x250?text=Producto+1+500g'
                ],
                precios: [80, 150, 295],
                gramajes: ['250g', '500g', '1kg']
            },
            {
                ids: [5, 6, 7],
                nombre: 'Cafe Molido Taza Negra',
                descripcion: 'Nuestro café molido es práctico y mantiene la calidad y el sabor auténtico de Taza Negra, perfecto para preparar rápidamente una taza deliciosa.',
                imagenes: [
                    'https://via.placeholder.com/250x250?text=Producto+2+100g',
                    'https://via.placeholder.com/250x250?text=Producto+2+250g',
                    'https://via.placeholder.com/250x250?text=Producto+2+500g'
                ],
                precios: [80, 150, 295],
                gramajes: ['250g', '500g', '1kg']
            }
        ],
        productoSeleccionado: 0,
        gramajeSeleccionado: 0,
        cantidad: 1
    }"
    class="flex flex-col md:flex-row items-center justify-center bg-gray-200 px-2 py-8 w-full"
>
    <!-- Selector de productos a la izquierda en desktop, arriba en móvil -->
    <div class="flex flex-col items-center gap-2 w-full md:w-48 mb-4 md:mb-0 md:mr-8">
        <template x-for="(producto, idx) in productos" :key="idx">
            <button
                @click="productoSeleccionado = idx; gramajeSeleccionado = 0"
                class="w-full px-4 py-3 rounded-lg border text-lg font-semibold transition-all duration-300 text-left"
                :class="productoSeleccionado === idx ? 'border-black bg-gray-200 shadow' : 'border-gray-200 bg-white hover:bg-gray-50'"
                x-text="producto.nombre"
            ></button>
        </template>
    </div>

    <!-- Card del producto seleccionado -->
    <div class="bg-white rounded-2xl shadow-xl p-8 text-center space-y-4 transition duration-300 w-full max-w-lg">
        <img 
            :src="productos[productoSeleccionado].imagenes[gramajeSeleccionado]" 
            :alt="productos[productoSeleccionado].nombre" 
            class="mx-auto rounded-xl transition duration-500 ease-in-out hover:scale-110 w-48 h-48 object-cover"
        >
        <h2 class="text-2xl font-semibold" x-text="productos[productoSeleccionado].nombre"></h2>
        
        <!-- Descripción del producto -->
        <p class="text-gray-600 mb-2" x-text="productos[productoSeleccionado].descripcion"></p>

        <!-- Botones de gramaje -->
        <div class="flex justify-center gap-2">
            <template x-for="(g, i) in productos[productoSeleccionado].gramajes" :key="i">
                <button @click="gramajeSeleccionado = i"
                    class="px-4 py-2 border rounded-full text-base transition-all duration-300"
                    :class="gramajeSeleccionado === i ? 'bg-black text-white scale-105' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 hover:scale-105'"
                    x-text="g"></button>
            </template>
        </div>

        <!-- Precio con transición -->
        <div class="relative h-8">
            <template x-for="(p, i) in productos[productoSeleccionado].precios" :key="i">
                <span x-show="gramajeSeleccionado === i"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute inset-0 text-xl font-bold text-gray-800 flex items-center justify-center"
                    x-text="'$' + p + ' MXN'"
                    x-cloak></span>
            </template>
        </div>

        <!-- Selector de cantidad y botón Agregar al carrito solo para usuarios autenticados -->
        @auth
            <!-- Ejemplo de botones + y - más grandes usando Tailwind -->
            <div class="flex items-center justify-center gap-2 mt-4">
                <button
                    type="button"
                    class="px-3 py-1 bg-gray-300 rounded-full text-xl font-bold"
                    @click="if(cantidad > 1) cantidad--"
                >-</button>
                <input
                    type="number"
                    min="1"
                    x-model="cantidad"
                    class="w-16 text-center border rounded text-lg"
                >
                <button
                    type="button"
                    class="px-3 py-1 bg-gray-300 rounded-full text-lg font-bold"
                    @click="cantidad++"
                >+</button>
            </div>

            <div class="mt-6">
                <button
                    @click.prevent="
                        fetch('{{ route('cart.add') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                    body: JSON.stringify({
                        id: productos[productoSeleccionado].ids[gramajeSeleccionado],
                        product_id: productos[productoSeleccionado].ids[gramajeSeleccionado],
                        nombre: productos[productoSeleccionado].nombre + ' ' + productos[productoSeleccionado].gramajes[gramajeSeleccionado],
                        precio: productos[productoSeleccionado].precios[gramajeSeleccionado],
                        cantidad: cantidad
                    })
                }).then(r => r.json()).then(data => {
                    alert('¡Producto agregado al carrito!');
                    cantidad = 1;
                });
            "
            class="w-full md:w-auto px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition duration-300"
        >
            Agregar al carrito
        </button>
    </div>
@endauth
</div>

<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type=number] {
  -moz-appearance: textfield;
}
</style>