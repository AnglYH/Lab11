<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasajero extends Model
{
    use HasFactory;

    protected $table = 'pasajeros';

    protected $fillable = [
        'nombre',
        'apellido',
        'celular',
        'numero_asientos',
        'vuelo_id'
    ];

    public function vuelo(): BelongsTo {
        return $this->belongsTo(Vuelo::class);
    }
}
