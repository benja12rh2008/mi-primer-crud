<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/contactos', 'contactos');

Route::get('/', function () {
    return view('welcome');
});