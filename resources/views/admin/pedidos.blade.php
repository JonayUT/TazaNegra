@extends('Plantillas.base')
@section('title', 'Pedidos Pendientes')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Pedidos Pendientes</h1>
    @php
        $estados = \App\Models\Estado::dropdownOptions();
    @endphp
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 text-center">ID</th>
                <th class="py-2 text-center">Cliente</th>
                <th class="py-2 text-center">Fecha</th>
                <th class="py-2 text-center">Total</th>
                <th class="py-2 text-center">Estado</th>
                <th class="py-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-t">
                <td class="py-2 text-center">{{ $order->id }}</td>
                <td class="py-2 text-center">{{ $order->user->nombre }}</td>
                <td class="py-2 text-center">{{ $order->created_at }}</td>
                <td class="py-2 text-center">${{ $order->total }}</td>
                <td class="py-2 text-center">
                    <select class="estado-dropdown" data-order="{{ $order->id }}">
                        @foreach($estados as $id => $nombre)
                            <option value="{{ $id }}" {{ $order->estado == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                        @endforeach
                    </select>
                    <span class="estado-msg" style="display:none; color:green; font-size:0.9em;">✓</span>
                </td>
                <td class="py-2 text-center">
                    <a href="{{ route('admin.order.ver', ['order' => $order->id]) }}" class="btn btn-primary">
                        Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
document.querySelectorAll('.estado-dropdown').forEach(function(select) {
    select.addEventListener('change', function() {
        const orderId = this.getAttribute('data-order');
        const msg = this.nextElementSibling;
        fetch('/admin/order/' + orderId + '/estado', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ estado: this.value })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                msg.style.display = 'inline';
                setTimeout(() => { msg.style.display = 'none'; }, 2000);
            }
        });
    });
});
</script>
@endsection