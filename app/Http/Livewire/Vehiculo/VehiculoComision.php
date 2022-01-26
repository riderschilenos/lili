<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Livewire\Component;

class VehiculoComision extends Component
{   public $selectedcomision, $vehiculoupdate;

    public function mount(Vehiculo $vehiculo){

        $this->vehiculo = $vehiculo;

    }

    public function render()
    {
        return view('livewire.vehiculo.vehiculo-comision');
    }

    public function updatedselectedcomision($comision){
        
        
        $this->selectedcomision = $comision;
    
    }

    public function edit(Vehiculo $vehiculo){

        $vehiculo->precio=null;

        $vehiculo->save();

        $this->vehiculo = $vehiculo;

    }

    public function publicar(Vehiculo $vehiculo){

        $vehiculo->status=4;

        $vehiculo->save();

        return redirect()->route('garage.usados');

    }
}
