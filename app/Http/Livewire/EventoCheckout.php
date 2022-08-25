<?php

namespace App\Http\Livewire;

use App\Models\Evento;
use App\Models\Fecha;
use Livewire\Component;

class EventoCheckout extends Component
{   
    public $evento;

    public function mount(Evento $evento){
        
        $this->evento =$evento;
        
    }

    public function render()
    {   
        $fechas= Fecha::where('evento_id',$this->evento->id)->paginate();
        return view('livewire.evento-checkout',compact('fechas'));
    }
}
