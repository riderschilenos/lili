<?php

namespace App\Http\Livewire;

use App\Models\Evento;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class EventoView extends Component
{   use AuthorizesRequests;

    public $evento, $current;

    public function mount(Evento $evento){
        
        $this->evento =$evento;
        
    }

    public function render()
    {
        return view('livewire.evento-view');
    }
}
