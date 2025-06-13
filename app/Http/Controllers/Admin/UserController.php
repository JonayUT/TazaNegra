<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::with('role')->get();
        return view('admin.users', compact('usuarios'));
    }

    public function show(User $usuario)
    {
        $addresses = $usuario->addresses;
        $orders = $usuario->orders()->with('orderItems.product')->get();
        return view('admin.user_show', compact('usuario', 'addresses', 'orders'));
    }

    public function edit(User $usuario)
    {
        return view('admin.user_edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuario->id,
            'role_id' => 'required|exists:roles,id',
        ]);
        $usuario->update($data);
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado');
    }
}
