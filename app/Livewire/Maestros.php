<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Maestro;

class Maestros extends Component
{
    public $nombre, $especialidad, $selected_id;

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|min:3',
            'especialidad' => 'required'
        ]);

        Maestro::updateOrCreate(['id' => $this->selected_id], [
            'nombre' => $this->nombre,
            'especialidad' => $this->especialidad,
            'estado' => 'Activo'
        ]);

        $this->reset();
        $this->dispatch('close-modal-maestro');
    }

    public function eliminar($id)
    {
        Maestro::destroy($id);
    }

    public function render()
    {
        return view('components.maestros.maestros', [
            'maestros' => \App\Models\Maestro::all()
        ]);
    }
}