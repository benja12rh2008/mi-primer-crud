<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     * Esto permite usar Maestro::create(['nombre' => '...']);
     */
    protected $fillable = [
        'nombre',
        'estado',
    ];
}