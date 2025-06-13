<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'usuario_id', 'calle', 'numero', 'colonia', 'ciudad', 'estado', 'cp', 'telefono'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
