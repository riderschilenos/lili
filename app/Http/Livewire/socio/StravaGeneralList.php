<?php

namespace App\Http\Livewire\Socio;

use App\Models\AtletaStrava;
use Livewire\Component;
use Livewire\WithPagination;

class StravaGeneralList extends Component
{   use WithPagination;

    public function render()
    {   $atletas_stravas=AtletaStrava::where('id','>',0)->paginate(100);
        return view('livewire.socio.strava-general-list',compact('atletas_stravas'));
    }
}
