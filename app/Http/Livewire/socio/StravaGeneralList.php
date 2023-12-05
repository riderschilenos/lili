<?php

namespace App\Http\Livewire\Socio;

use App\Models\AtletaStrava;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class StravaGeneralList extends Component
{   use WithPagination;
    public $orden=1;

    public function render()
    {   $atletas_stravas=User::select('users.id', 'users.name', 'users.profile_photo_path', DB::raw('COALESCE(SUM(activities.distance), 0) AS total_distance'))
        ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
        ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
        ->groupBy('users.id', 'users.name', 'users.profile_photo_path')
        ->orderByDesc('total_distance')
        ->paginate(100);

        $fechaHace7Dias = Carbon::now()->subDays(7);

        $atletas_stravas7dias =  User::select('users.id', 'users.name', 'users.profile_photo_path', DB::raw('COALESCE(SUM(last_week_activities.distance), 0) AS total_distance'))
                                ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
                                ->leftJoin(DB::raw('(SELECT user_id, SUM(distance) AS distance
                                                FROM activities
                                                WHERE start_date_local >= :fechaHace7Dias
                                                GROUP BY user_id) AS last_week_activities'), 'users.id', '=', 'last_week_activities.user_id')
                                ->setBindings(['fechaHace7Dias' => $fechaHace7Dias]) // Pasa la variable a la subconsulta
                                ->groupBy('users.id', 'users.name', 'users.profile_photo_path')
                                ->orderByDesc('total_distance')
                                ->paginate(100);

        $now=Carbon::now();
        
        return view('livewire.socio.strava-general-list',compact('atletas_stravas','atletas_stravas7dias','now'));
    }
    public function set_orden($id){
        $this->orden==$id;
    }
}
