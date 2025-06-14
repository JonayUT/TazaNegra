<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function verOrder(Order $order)
    {
        $order->load('orderItems', 'address', 'user', 'estadoRelacion');
        return view('admin.order_detalle', compact('order'));
    }
    public function actualizarEstado(Request $request, Order $order)
    {
        $request->validate([
            'estado' => 'required|exists:estados,id',
        ]);
        $order->estado = $request->estado;
        $order->save();
        return response()->json(['success' => true]);
    }
}
