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

        $fechaHace7Dias = Carbon::now()->subDays(6);

        $atletas_stravas7dias = User::select(
                                    'users.id',
                                    'users.name',
                                    'users.profile_photo_path',
                                    DB::raw('COALESCE(SUM(CASE WHEN activities.start_date_local >= :fechaHace7Dias THEN activities.distance ELSE 0 END), 0) AS last_week_distance')
                                )
                                    ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
                                    ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
                                    ->groupBy('users.id', 'users.name', 'users.profile_photo_path')
                                    ->havingRaw('last_week_distance > 0') // Filtra usuarios con last_week_distance mayor que cero
                                    ->orderByDesc('last_week_distance') // Ordena por last_week_distance de mayor a menor
                                    ->setBindings(['fechaHace7Dias' => $fechaHace7Dias])
                                    ->paginate(100);

        $atletas_stravas7dias2 = User::select(
                                'users.id',
                                'users.name',
                                'users.profile_photo_path',
                                DB::raw('COALESCE(SUM(CASE WHEN activities.start_date_local >= :fechaHace7Dias THEN activities.distance ELSE 0 END), 0) AS last_week_distance'),
                                DB::raw('COALESCE(SUM(activities.distance), 0) AS total_distance') // Suma total de la distancia
                            )
                                ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
                                ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
                                ->groupBy('users.id', 'users.name', 'users.profile_photo_path')
                                ->havingRaw('last_week_distance = 0') // Filtra usuarios con last_week_distance igual a cero
                                ->orderByDesc('total_distance') // Ordena por la suma total de distancia de mayor a menor
                                ->setBindings(['fechaHace7Dias' => $fechaHace7Dias])
                                ->paginate(100);

        $now=Carbon::now();
        
        return view('livewire.socio.strava-general-list',compact('atletas_stravas','atletas_stravas7dias','atletas_stravas7dias2','now'));
    }
    public function set_orden($id){
        $this->orden==$id;
    }
}
