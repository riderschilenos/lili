<?php

namespace App\Http\Livewire\Socio;

use App\Models\Activitie;
use Livewire\Component;

class StravaCountTotal extends Component
{
    public function render()
    {   $activities=Activitie::all();
        $activities7=Activitie::all()->where('created_at', '>=', now()->subDays(7));
        return view('livewire.socio.strava-count-total',compact('activities','activities7'));
    }
}
