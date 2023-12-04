<?php

namespace App\Http\Livewire\Socio;

use App\Models\AtletaStrava;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class StravaGeneralList extends Component
{   use WithPagination;

    public function render()
    {   $atletas_stravas= User::select('users.*', DB::raw('COALESCE(total_distance, 0) as total_distance'))
        ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
        ->leftJoin(DB::raw('(SELECT user_id, SUM(distance) as total_distance FROM activities GROUP BY user_id) as activity_sum'), 'users.id', '=', 'activity_sum.user_id')
        ->paginate(100);
        
        return view('livewire.socio.strava-general-list',compact('atletas_stravas'));
    }
}
