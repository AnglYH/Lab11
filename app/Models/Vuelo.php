<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $table = 'vuelos';

    protected $fillable = [
        'origen',
        'destino',
        'fecha_vuelo',
        'hora_vuelo',
        'precio_vuelo',
        'cantidad_pasajeros'
    ];
}
