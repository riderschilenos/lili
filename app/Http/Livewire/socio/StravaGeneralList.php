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

        $atletas_stravas7dias = User::select('users.id', 'users.name', 'users.profile_photo_path', DB::raw('COALESCE(SUM(activities.distance), 0) AS total_distance'))
                                ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
                                ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
                                ->where('activities.start_date_local', '>=', $fechaHace7Dias) // Filtrar por actividades de los últimos 7 días
                                ->groupBy('users.id', 'users.name', 'users.profile_photo_path')
                                ->orderByDesc('total_distance')
                                ->paginate(100);
        $atletas_stravas7dias2 = User::select('users.id', 'users.name', 'users.profile_photo_path', DB::raw('COALESCE(SUM(activities.distance), 0) AS total_distance'))
                                ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
                                ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
                                ->where(function($query) use ($fechaHace7Dias) {
                                    $query->where('activities.start_date_local', '>=', $fechaHace7Dias)
                                        ->orWhereNull('activities.start_date_local');
                                })
                                ->orWhereNull('activities.user_id') // Usuarios sin actividades registradas
                                ->groupBy('users.id', 'users.name', 'users.profile_photo_path')
                                ->havingRaw('MAX(activities.start_date_local) < ?', [$fechaHace7Dias]) // Para usuarios sin actividad en los últimos 7 días
                                ->orderByDesc('total_distance')
                                ->paginate(100);

        $now=Carbon::now();
        
        return view('livewire.socio.strava-general-list',compact('atletas_stravas','atletas_stravas7dias','atletas_stravas7dias2','now'));
    }
    public function set_orden($id){
        $this->orden==$id;
    }
}
