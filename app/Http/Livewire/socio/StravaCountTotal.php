<?php

namespace App\Http\Livewire\Socio;

use App\Models\Activitie;
use App\Models\AtletaStrava;
use Livewire\Component;

class StravaCountTotal extends Component
{
    public function render()
    {   $activities=Activitie::all();
        $activities7=Activitie::all()->where('created_at', '>=', now()->subDays(7));
        $atletastrava=AtletaStrava::all();
        return view('livewire.socio.strava-count-total',compact('activities','activities7','atletastrava'));
    }
}
