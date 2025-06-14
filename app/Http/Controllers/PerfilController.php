<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Order;

class PerfilController extends Controller
{
    // Muestra el perfil del usuario
    public function index()
    {
        $user = Auth::user()->load([
            'orders.estadoRelacion', // Carga la relación estado de cada pedido
            'addresses'
        ]);
        return view('perfil.perfil', compact('user'));
    }

    // Muestra el formulario para editar el perfil
    public function edit()
    {
        $usuario = Auth::user();
        return view('perfil.editar', compact('usuario'));
    }

    // Actualiza los datos del perfil
    public function update(Request $request)
    {
        $usuario = Auth::user();
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:10', 
            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuario->id,
            // Si quieres permitir cambiar la foto:
            'foto_url' => 'nullable|url',
        ]);
        $usuario->update($data);
        return redirect()->route('perfil')->with('success', 'Perfil actualizado');
    }

    // Muestra el formulario para agregar una nueva dirección
    public function nuevaDireccion()
    {
        return view('perfil.direccion_nueva');
    }

    // Guarda la nueva dirección
    public function guardarDireccion(Request $request)
    {
        $data = $request->validate([
            'calle' => 'required|string|max:255',
            'numero' => 'required|string|max:50',
            'colonia' => 'required|string|max:100',
            'ciudad' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
            'cp' => 'required|string|max:10',
        ]);
        $data['usuario_id'] = Auth::id();
        Address::create($data);
        return redirect()->route('perfil')->with('success', 'Dirección agregada');
    }

    // Elimina una dirección
    public function eliminarDireccion(\App\Models\Address $direccion)
    {
        if ($direccion->usuario_id == auth()->id()) {
            $direccion->delete();
            return redirect()->route('perfil')->with('success', 'Dirección eliminada');
        }
        abort(403);
    }

    // Muestra los detalles de un pedido
    public function verPedido(\App\Models\Order $pedido)
    {
        // Solo permite ver pedidos del usuario autenticado
        if ($pedido->usuario_id !== Auth::id()) {
            abort(403);
        }
        $pedido->load('orderItems', 'address');
        return view('perfil.pedido_detalle', compact('pedido'));
    }

    public function perfil()
    {
        $user = Auth::user()->load([
            'orders.estado',
            'addresses'
        ]);
        return view('perfil.perfil', compact('user'));
    }
}
