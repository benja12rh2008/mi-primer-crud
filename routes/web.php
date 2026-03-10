<?php

use Illuminate\Support\Facades\Route;

// Ruta simple que carga una vista común
Route::get('/', function () {
    return view('inicio');
});