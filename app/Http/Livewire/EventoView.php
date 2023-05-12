<?php

namespace App\Http\Livewire;

use App\Models\Evento;
use App\Models\Ticket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class EventoView extends Component
{   use AuthorizesRequests;

    public $evento, $current;

    public function mount(Evento $evento){
        
        $this->evento =$evento;
        

        
    }

    public function render()
    {   $tickets=Ticket::where('user_id',auth()->user()->id)->get();
        return view('livewire.evento-view',compact('tickets'));
    }
}
