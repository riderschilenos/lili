<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Carbon\Carbon;
use Livewire\Component;

class VehiculoMantencion extends Component
{   
    public $vehiculo_id, $mantencion;

    public $rating = 5;
    
    public function mount(Vehiculo $vehiculo){
    $this->vehiculo_id=$vehiculo->id;
    }
    public function render()
    {   
        $vehiculo = Vehiculo::find($this->vehiculo_id);

        $now = Carbon::now();

        return view('livewire.vehiculo.vehiculo-mantencion',compact('vehiculo','now'));
    }
}
