<?php

use Illuminate\Support\Facades\Route;

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
