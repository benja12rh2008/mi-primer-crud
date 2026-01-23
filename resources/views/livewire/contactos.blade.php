<?php
use function Livewire\Volt\{state};
use App\Models\Contacto;

// Definimos los estados necesarios
state([
    'nombre' => '', 
    'telefono' => '', 
    'edad' =>'',
    'sexo' =>'',
    'lugar' =>'',
    'id_contacto' => null, 
    'editando' => false
]);

// Función para Guardar o Actualizar
$guardar = function () {
    $this->validate([
        'nombre' => 'required|min:3',
        'telefono' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'lugar' => 'required',  
    ]);

    if ($this->editando) {
        $contacto = Contacto::find($this->id_contacto);
        $contacto->update([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'edad' => $this->edad,
            'sexo' =>$this->sexo,
            'lugar' =>$this->lugar,
        ]);
    } else {
        Contacto::create([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'edad' => $this->edad,
            'sexo' =>$this->sexo,
            'lugar' =>$this->lugar
        ]);
    }

    $this->reset(['nombre', 'telefono','edad', 'sexo','lugar','id_contacto', 'editando']); 
};

// Función para cargar los datos en el formulario (Editar)
$editar = function ($id) {
    $contacto = Contacto::find($id);
    $this->id_contacto = $contacto->id;
    $this->nombre = $contacto->nombre;
    $this->edad = $contacto->edad;
    $this->sexo = $contacto->sexo;
    $this->lugar = $contacto->lugar;
    $this->telefono = $contacto->telefono;
    $this->editando = true;
};

// Función para Eliminar
$eliminar = function ($id) {
    Contacto::find($id)->delete();
};

// Función para cancelar la edición
$cancelar = function () {
    $this->reset(['nombre', 'telefono','edad','sexo','lugar','id_contacto', 'editando']);
};
?>

<div>
    <h2 style="margin-bottom: 20px;">{{ $this->editando ? 'Editar Contacto' : 'Nuevo Contacto' }}</h2>

    <div style="margin-bottom: 30px; display: flex; gap: 10px;">
        <input type="text" wire:model="nombre" placeholder="Nombre">
        <input type="text" wire:model="telefono" placeholder="Teléfono">
        <input type="text" wire:model="edad" placeholder="Edad">
        <input type="text" wire:model="sexo" placeholder="Sexo">
        <input type="text" wire:model="lugar" placeholder="Lugar">

        
        <button wire:click="guardar" style="background: #28a745; color: white; border: none; padding: 10px; cursor: pointer;">
            {{ $this->editando ? 'Actualizar' : 'Guardar' }}
        </button>

        @if($this->editando)
            <button wire:click="cancelar" style="background: #6c757d; color: white; border: none; padding: 10px; cursor: pointer;">
                Cancelar
            </button>
        @endif
    </div>

    <hr>

    <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px; background: white;">
        <thead style="background: #333; color: white;">
            <tr>
                <th style="padding: 10px;">Nombre</th>
                <th style="padding: 10px;">Teléfono</th>
                <th style="padding: 10px;">Edad</th>
                <th style="padding: 10px;">Sexo</th>
                <th style="padding: 10px;">Lugar</th>
                <th style="padding: 10px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Contacto::all() as $con)
                <tr>
                    <td style="padding: 10px;">{{ $con->nombre }}</td>
                    <td style="padding: 10px;">{{ $con->telefono }}</td>
                    <td style="padding: 10px;">{{ $con->edad }}</td>
                    <td style="padding: 10px;">{{ $con->sexo }}</td>
                    <td style="padding: 10px;">{{ $con->lugar }}</td>
                    <td style="padding: 10px; text-align: center;">
                        <button wire:click="editar({{ $con->id }})" style="background: #ffc107; border: none; padding: 5px 10px; cursor: pointer; margin-right: 5px;">
                            Editar
                        </button>
                        <button wire:click="eliminar({{ $con->id }})" onclick="confirm('¿Seguro?') || event.stopImmediatePropagation()" style="background: #dc3545; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>