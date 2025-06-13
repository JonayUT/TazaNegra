<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class PedidoController extends Controller
{
    public function index()
    {
        // Cambia 'cliente' por 'user' si tu relación es user()
        $orders = Order::with('user')->get();
        return view('admin.pedidos', compact('orders'));
    }
}
