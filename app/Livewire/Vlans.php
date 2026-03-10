<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vlan;
use App\Models\Maestro; // IMPORTANTE: Importamos el nuevo modelo

class Vlans extends Component
{
    // Variables para VLAN
    public $olt, $vlan_id, $descripcion;
    
    // Variables para MAESTRO (Nuevo)
    public $nombre_maestro;

    // --- LÓGICA DE VLAN (Ya la tenías) ---
    public function guardar() {
        $this->validate(['olt' => 'required', 'vlan_id' => 'required', 'descripcion' => 'required']);
        Vlan::create(['olt' => $this->olt, 'vlan_id' => $this->vlan_id, 'descripcion' => $this->descripcion]);
        $this->reset(['olt', 'vlan_id', 'descripcion']);
        $this->dispatch('close-modal'); 
    }

    public function eliminar($id) {
        Vlan::destroy($id);
    }

    public function editar($id) {
        $vlan = Vlan::findOrFail($id);
        $this->vlan_id = $vlan->vlan_id;
        $this->descripcion = $vlan->descripcion;
        $this->olt = $vlan->olt;
    }

    // --- LÓGICA DE MAESTRO (Nueva) ---
    public function guardarMaestro() {
        $this->validate([
            'nombre_maestro' => 'required|min:3'
        ]);

        Maestro::create([
            'nombre' => $this->nombre_maestro,
            'estado' => 'En línea' // Por defecto
        ]);

        $this->reset(['nombre_maestro']); // Limpia el campo
        $this->dispatch('close-modal-maestro'); // Cierra el modal de usuario
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