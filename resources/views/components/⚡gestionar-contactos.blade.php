<?php
use App\Models\Contacto;
use function Livewire\Volt\{state};

state(['nombre' => '', 'telefono' => '']);

$guardar = function () {
    $this->validate([
        'nombre' => 'required',
        'telefono' => 'required',
    ]);

    Contacto::create([
        'nombre' => $this->nombre,
        'telefono' => $this->telefono,
    ]);

    $this->reset(['nombre', 'telefono']);
};
?>

<div style="padding: 20px;">
    <h1>Mi Lista de Contactos</h1>

    <div>
        <input type="text" wire:model="nombre" placeholder="Nombre">
        <input type="text" wire:model="telefono" placeholder="Teléfono">
        <button wire:click="guardar">Guardar</button>
    </div>

    <hr>

    <ul>
        @foreach(Contacto::all() as $contacto)
            <li>{{ $contacto->nombre }} - {{ $contacto->telefono }}</li>
        @endforeach
    </ul>
</div>