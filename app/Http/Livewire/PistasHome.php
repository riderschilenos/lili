<?php

namespace App\Http\Livewire;

use App\Models\Evento;
use Livewire\Component;

class PistasHome extends Component
{
    public function render()
    {   $pistas=Evento::where('status', 1)
        ->whereIn('type', ['pista', 'desafio', 'carrera'])
        ->latest('id')
        ->paginate(4);
    
        return view('livewire.pistas-home',compact('pistas'));
    }
}
