<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Livewire\Component;

class VehiculoPagoinscripcion extends Component
{   
    public function mount(Vehiculo $vehiculo){

        $this->vehiculo = $vehiculo;

    }

    public function render()
    {
        return view('livewire.vehiculo.vehiculo-pagoinscripcion');
    }


    
}
