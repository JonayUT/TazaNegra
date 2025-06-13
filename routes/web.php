<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\Admin\PedidoController;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;

// Páginas principales
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/productos', function () {
    return view('Productos.productos');
})->name('productos');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/news', function () {
    return view('news');
})->name('news');

// Autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Carrito de compras
Route::get('/carrito', function () {
    return view('carrito');
})->name('cart');

Route::post('/carrito/agregar', function (\Illuminate\Http\Request $request) {
    $cart = session()->get('cart', []);
    $id = $request->input('id');
    $product_id = $request->input('product_id'); // <-- Agrega esto
    $nombre = $request->input('nombre');
    $precio = $request->input('precio');
    $cantidad = (int) $request->input('cantidad', 1);

    // Si ya existe el producto, suma la cantidad
    if (isset($cart[$id])) {
        $cart[$id]['cantidad'] += $cantidad;
    } else {
        $cart[$id] = [
            'id' => $id,
            'product_id' => $product_id, // <-- Guarda el product_id real
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad,
        ];
    }
    session(['cart' => $cart]);
    return response()->json(['ok' => true, 'cart_count' => count($cart)]);
})->name('cart.add');

Route::post('/carrito/eliminar', function (\Illuminate\Http\Request $request) {
    $cart = session()->get('cart', []);
    $id = $request->input('id');
    if (isset($cart[$id])) {
        unset($cart[$id]);
    }
    session(['cart' => $cart]);
    return redirect()->route('cart');
})->name('cart.remove');

// Panel de administrador (usuarios)
Route::prefix('admin/usuarios')->name('admin.usuarios.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{usuario}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{usuario}', [UserController::class, 'update'])->name('update');
    Route::delete('/{usuario}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('/{usuario}', [UserController::class, 'show'])->name('show');
});

// Pedidos pendientes
Route::get('/admin/pedidos', [PedidoController::class, 'index'])->name('admin.pedidos');

// Perfil de usuario (autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.editar');
    Route::post('/perfil/editar', [PerfilController::class, 'update'])->name('perfil.update');

    Route::get('/perfil/direccion/nueva', [PerfilController::class, 'nuevaDireccion'])->name('perfil.direccion.nueva');
    Route::post('/perfil/direccion/nueva', [PerfilController::class, 'guardarDireccion'])->name('perfil.direccion.guardar');
    Route::delete('/perfil/direccion/{direccion}', [PerfilController::class, 'eliminarDireccion'])->name('perfil.direccion.eliminar');

    Route::get('/perfil/pedido/{pedido}', [PerfilController::class, 'verPedido'])->name('perfil.pedido.ver');
});

// Checkout
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::post('/checkout/simular', function(Request $request) {
    $cart = session('cart', []);
    $direccion_id = $request->input('direccion_id');
    $usuario = Auth::user();

    if (!$direccion_id || !Address::where('id', $direccion_id)->where('usuario_id', $usuario->id)->exists()) {
        return redirect()->back()->withErrors(['direccion_id' => 'Debes seleccionar una dirección válida.']);
    }

    // Crear el pedido
    $pedido = Order::create([
        'usuario_id' => $usuario->id,
        'address_id' => $direccion_id,
        'total' => collect($cart)->sum(function($item) { return $item['precio'] * $item['cantidad']; }),
        'status' => 'Nuevo Pedido',
    ]);

    // Crear los items del pedido
    foreach ($cart as $item) {
        if (!isset($item['product_id'])) {
            continue; // O puedes lanzar un error personalizado
        }
        OrderItem::create([
            'order_id' => $pedido->id,
            'product_id' => $item['product_id'],
            'nombre' => $item['nombre'],
            'cantidad' => $item['cantidad'],
            'precio' => $item['precio'],
        ]);
    }

    // Limpiar el carrito
    session()->forget('cart');

    // Cargar relaciones para la vista
    $pedido->load('orderItems', 'address');

    return view('checkout.simular', compact('pedido'));
})->name('checkout.simular');
