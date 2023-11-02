<?php

namespace App\Http\Livewire\Socio;

use App\Models\Socio;
use Livewire\Component;

class SocioDonacion extends Component
{   public $socio, $valor;

    public function mount(Socio $socio){
        $this->socio=$socio;
    }

    public function render()
    {
        return view('livewire.socio.socio-donacion');
    }

    public function updatevalor($valor){
        $this->valor=$valor;
    }
}
