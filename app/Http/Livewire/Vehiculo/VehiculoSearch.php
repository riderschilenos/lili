<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Livewire\Component;
use Livewire\WithPagination;

class VehiculoSearch extends Component
{   
    use WithPagination;

    public $search;

    public function render()
    {   
        $vehiculos = Vehiculo::
        join('users','vehiculos.user_id','=','users.id')
        ->select('vehiculos.*','users.name','users.email')
        ->orwhere('name','LIKE','%'. $this->search .'%')
        ->orwhere('users.email','LIKE','%'. $this->search .'%')
        ->orwhere('vehiculos.modelo','LIKE','%'. $this->search .'%')
        ->orwhere('vehiculos.nro_serie','LIKE','%'. $this->search .'%')
        ->latest('id')
        ->paginate(100);

        return view('livewire.vehiculo.vehiculo-search',compact('vehiculos'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
