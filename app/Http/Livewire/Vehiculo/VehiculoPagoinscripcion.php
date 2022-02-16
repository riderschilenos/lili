<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Livewire\Component;

class VehiculoPagoinscripcion extends Component
{   
    public $suscripcion;

    public function mount(Vehiculo $vehiculo){

        $this->vehiculo = $vehiculo;

    }

    public function render()
    {
        return view('livewire.vehiculo.vehiculo-pagoinscripcion');
    }

    public function suscripcion($suscripcion){
        
        $this->suscripcion = $suscripcion;
        if($suscripcion=='gratis'){
            $this->vehiculo->insc='1';
            $this->suscripcion=$suscripcion;
        }
        if($suscripcion=='5000'){
            $this->vehiculo->insc='2';
            $this->suscripcion=$suscripcion;
        }
        if($suscripcion=='10000'){
            $this->vehiculo->insc='3';
            $this->suscripcion=$suscripcion;            
        }

        $this->vehiculo->save();
        
        return route('garage.inscripcion',$this->vehiculo);
    }
    
}
