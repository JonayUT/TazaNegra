<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // o el nombre real de tu tabla

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        // agrega aquí los demás campos de tu tabla
    ];

    // Relación con OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
