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
        $vehiculos = Vehiculo::join('users', 'vehiculos.user_id', '=', 'users.id')
                    ->select('vehiculos.*', 'users.name', 'users.email')
                    ->where('vehiculos.status', 6) // Agregar esta línea para filtrar por estado
                    ->where(function($query) {
                        $query->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('users.email', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('vehiculos.modelo', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('vehiculos.nro_serie', 'LIKE', '%' . $this->search . '%');
                    })
                    ->latest('id')
                    ->paginate(8);

        return view('livewire.vehiculo.vehiculo-search',compact('vehiculos'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
