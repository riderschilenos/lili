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

        $atletas_stravas7dias =User::select(
            'users.id',
            'users.name',
            'users.profile_photo_path',
            DB::raw('COALESCE(SUM(activities.distance), 0) AS total_distance'),
            DB::raw('COALESCE(SUM(CASE WHEN activities_last_week.total_distance_last_week IS NOT NULL THEN activities_last_week.total_distance_last_week ELSE 0 END), 0) AS last_week_distance')
        )
        ->join('atleta_stravas', 'users.id', '=', 'atleta_stravas.user_id')
        ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
        ->leftJoin(DB::raw('(SELECT user_id, SUM(distance) AS total_distance_last_week
                         FROM activities
                         WHERE start_date_local >= :fechaHace7Dias
                         GROUP BY user_id) AS activities_last_week'), function($join) {
                             $join->on('users.id', '=', 'activities_last_week.user_id');
                         })
        ->groupBy('users.id', 'users.name', 'users.profile_photo_path')
        ->orderByDesc('last_week_distance')
        ->setBindings(['fechaHace7Dias' => $fechaHace7Dias])
        ->paginate(100);
        
        $now=Carbon::now();
        
        return view('livewire.socio.strava-general-list',compact('atletas_stravas','atletas_stravas7dias','now'));
    }
    public function set_orden($id){
        $this->orden==$id;
    }
}
