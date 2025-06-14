<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';

    protected $fillable = [
        'nombre',
    ];

    public $timestamps = false;

    // Relación con Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'estado', 'id');
    }

    public static function dropdownOptions()
    {
        return self::orderBy('nombre')->pluck('nombre', 'id');
    }
}
