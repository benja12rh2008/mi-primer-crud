<?php

use App\Livewire\Vlans;
use Illuminate\Support\Facades\Route;
use App\Livewire\Maestros;

Route::get('/vlans', Vlans::class)->name('vlans');
Route::get('/maestros', Maestros::class)->name('maestros');