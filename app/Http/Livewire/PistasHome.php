<?php

namespace App\Http\Livewire;

use App\Models\Evento;
use Livewire\Component;

class PistasHome extends Component
{
    public function render()
    {   $pistas=Evento::where('status',1)
        ->where('type','pista')
        ->latest('id')
        ->paginate(8);
        return view('livewire.pistas-home',compact('pistas'));
    }
}
