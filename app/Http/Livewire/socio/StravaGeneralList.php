<?php

namespace App\Http\Livewire\Socio;

use App\Models\AtletaStrava;
use Livewire\Component;
use Livewire\WithPagination;

class StravaGeneralList extends Component
{   use WithPagination;

    public function render()
    {   $atletas_stravas=AtletaStrava::where('id','>',0)->paginate(100);
        $atletas_stravas->sortByDesc(function ($atleta) {
            if ($atleta->activities) {
                return $atleta->activities->sum('distance'); // Suponiendo que 'activities' es la relación de actividades en tu modelo de atleta
            }
          
        });
        return view('livewire.socio.strava-general-list',compact('atletas_stravas'));
    }
}
