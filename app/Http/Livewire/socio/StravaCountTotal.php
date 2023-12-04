<?php

namespace App\Http\Livewire\Socio;

use App\Models\Activitie;
use Livewire\Component;

class StravaCountTotal extends Component
{
    public function render()
    {   $activities=Activitie::all();
        return view('livewire.socio.strava-count-total',compact('activities'));
    }
}
