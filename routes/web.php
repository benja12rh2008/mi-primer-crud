<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Vlans;
use App\Livewire\Maestros; // Tu nuevo componente
    

Route::get('/vlan', Vlans::class)->name('vlans');
Route::get('/maestros', Maestros::class)->name('maestros');

