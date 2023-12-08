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

        $fechaHace7Dias = Carbon::now()->subDays(8);

        $atletas_stravas7dias = User::select(
                                    'users.id',
                                    'users.name',
                                    'users.profile_photo_path',
                                    DB::raw('COALESCE(SUM(activities.distance), 0) AS total_distance'),
                                    DB::raw('COALESCE(SUM(CASE WHEN activities.start_date_local >= :fechaHace7Dias THEN activities.distance ELSE 0 END), 0) AS last_week_distance')
                                )
                                ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
                                ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
                                ->groupBy('users.id', 'users.name', 'users.profile_photo_path')
                                ->orderByRaw('last_week_distance > 0 DESC') // Ordena primero por actividad en los últimos 7 días (actividad > 0)
                                ->orderByDesc('last_week_distance') // Luego por la suma de la última semana
                                ->orderByDesc('total_distance') // Finalmente, por la suma total de distancia
                                ->setBindings(['fechaHace7Dias' => $fechaHace7Dias]) // Pasa la variable a la subconsulta
                                ->paginate(100);

        $now=Carbon::now();
        
        return view('livewire.socio.strava-general-list',compact('atletas_stravas','atletas_stravas7dias','now'));
    }
    public function set_orden($id){
        $this->orden==$id;
    }
}
