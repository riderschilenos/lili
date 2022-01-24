<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Marca;
use App\Models\Vehiculo;
use App\Models\Vehiculo_type;
use Livewire\Component;

class VehiculoCreate extends Component
{   public $selectedvehiculotype, $selectedmarca, $marca, $marcas, $name, $modelo, $file, $cilindrada, $año, $aro_front, $aro_back, $slug, $precio;

    public $vehiculo_type;
    
    public function render()
    {   
        $vehiculo_types= Vehiculo_type::all();

        return view('livewire.vehiculo.vehiculo-create',compact('vehiculo_types'));
    }


    public function updatedselectedvehiculotype($vehiculo_type){
        
        if($vehiculo_type==1 or $vehiculo_type==2 or $vehiculo_type==3 or $vehiculo_type==7){
            $disciplina_id=1;
        }


        $this->marcas = Marca::where('disciplina_id',$disciplina_id)->get();
        
        $this->selectedvehiculo_type = $vehiculo_type;
    
    }

    public function updatedselectedmarca($marca){


        $this->selectedmarca = $marca;

    
    }

  
}
