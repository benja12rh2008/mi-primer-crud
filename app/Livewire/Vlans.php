<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vlan;
use App\Models\Maestro;

class Vlans extends Component
{
    // Propiedades para los formularios (VLAN)
    public $olt, $vlan_id, $descripcion, $selected_id;
    
    // Propiedades para los formularios (MAESTRO)
    public $nombre_maestro;

    // --- LÓGICA DE VLAN ---
    public function guardar() {
        $this->validate([
            'olt' => 'required', 
            'vlan_id' => 'required', 
            'descripcion' => 'required'
        ]);

        // Si existe selected_id, actualiza; si no, crea uno nuevo
        Vlan::updateOrCreate(['id' => $this->selected_id], [
            'olt' => $this->olt, 
            'vlan_id' => $this->vlan_id, 
            'descripcion' => $this->descripcion
        ]);

        $this->reset(['olt', 'vlan_id', 'descripcion', 'selected_id']);
        $this->dispatch('close-modal'); 
    }

    public function eliminar($id) {
        Vlan::destroy($id);
    }

    public function editar($id) {
        $vlan = Vlan::findOrFail($id);
        $this->selected_id = $vlan->id;
        $this->vlan_id = $vlan->vlan_id;
        $this->descripcion = $vlan->descripcion;
        $this->olt = $vlan->olt;
        // El modal se abre desde el botón de la vista con data-bs-target
    }

    // --- LÓGICA DE MAESTRO ---
    public function guardarMaestro() {
        $this->validate([
            'nombre_maestro' => 'required|min:3'
        ]);

        Maestro::create([
            'nombre' => $this->nombre_maestro,
            'estado' => 'En línea'
        ]);

        $this->reset(['nombre_maestro']); 
        $this->dispatch('close-modal-maestro'); 
    }

    public function eliminarMaestro($id) {
        Maestro::destroy($id);
    }

    public function render()
    {
        return view('livewire.vlans', [
            'vlans' => Vlan::all(),
            'maestros' => Maestro::latest()->take(5)->get()
        ]);
    }
}