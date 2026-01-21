<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use Hasfactory;

    protected $fillable = ['nombre', 'telefono'];

}
