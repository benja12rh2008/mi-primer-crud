<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
Volt::route('/contactos', 'gestionar-contactos');
Route::get('/', function () {
    return view('welcome');
});
