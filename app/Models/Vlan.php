<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vlan extends Model
{
    use HasFactory;

    protected $fillable = ['vlan_id', 'descripcion', 'olt'];}