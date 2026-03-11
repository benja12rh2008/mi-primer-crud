<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Vlans;
use App\Livewire\Maestros; // Importante que esté aquí

Route::get('/vlans', Vlans::class)->name('vlans');
Route::get('/maestros', Maestros::class)->name('maestros');