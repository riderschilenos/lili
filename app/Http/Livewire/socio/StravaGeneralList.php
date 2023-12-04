<?php

namespace App\Http\Livewire\Socio;

use App\Models\AtletaStrava;
use Livewire\Component;

class StravaGeneralList extends Component
{
    public function render()
    {   $atletas_stravas=AtletaStrava::all();
        return view('livewire.socio.strava-general-list',compact('atletas_stravas'));
    }
}
