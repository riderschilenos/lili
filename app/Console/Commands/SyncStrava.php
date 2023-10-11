<?php

namespace App\Console\Commands;

use App\Models\Activitie;
use App\Models\AtletaStrava;
use App\Models\Sync;
use Carbon\Carbon;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class SyncStrava extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:strava';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizacion de la data de strava';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {      $atletas_stravas=AtletaStrava::all();
            $n=0;
        foreach ($atletas_stravas as $atletaStrava){
          
                
                $accessTokenExpiresAt = $atletaStrava->token_expires_at;
                if (now() >= $accessTokenExpiresAt) {
                    // El token de acceso ha caducado, solicita un nuevo token usando el token de actualización
                
                    // Realiza una solicitud POST para obtener un nuevo token de acceso usando el token de actualización
                    $client = new Client();
                    $response = $client->post('https://www.strava.com/oauth/token', [
                        'form_params' => [
                            'client_id' => env('ST_CLIENT_ID'),
                            'client_secret' => env('ST_CLIENT_SECRET'),
                            'refresh_token' => $atletaStrava->refresh_token,
                            'grant_type' => 'refresh_token',
                        ],
                    ]);
                
                    $newData = json_decode($response->getBody(), true);
                
                    // Actualiza el token de acceso en la base de datos con el nuevo token
                    $newAccessToken = $newData['access_token'];
                    $newAccessTokenExpiresAt = now()->addSeconds($newData['expires_in']); // Calcula el nuevo tiempo de expiración
                    $atletaStrava->update(['access_token'=>$newAccessToken,
                                'token_expires_at'=>$newAccessTokenExpiresAt]);

                    // Actualiza el token de acceso y su tiempo de expiración en la base de datos
                } else {
                    // El token de acceso aún es válido, úsalo para hacer solicitudes a la API de Strava
                }
                // ID del atleta para el que deseas obtener las actividades
                $athleteId = $atletaStrava->atleta_id;
                $accessToken = $atletaStrava->access_token;
                // URL de la API de Strava
                $url = "https://www.strava.com/api/v3/athletes/{$athleteId}/activities";

                // Configuración de la solicitud cURL
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Authorization: Bearer ' . $accessToken,
                ]);

                // Realizar la solicitud cURL
                $response = curl_exec($ch);

                $activities = json_decode($response, true);

                foreach($activities as $activity){
                    
                    $activ=Activitie::where('strava_id',$activity['id'])->first();

                    if ($activ) {
                       //
                    } else {
                        Activitie::create([
                            'user_id'=>$atletaStrava->user_id,
                            'name'=>$activity['name'],
                            'type'=>$activity['type'],
                            'strava_id'=>$activity['id'],
                            'start_date_local'=>$activity['start_date_local'],
                            'moving_time'=> $activity['moving_time'],
                         'distance'=>number_format(($activity['distance']/1000), 2, '.', '.'),
                         'total_elevation_gain'=>number_format($activity['total_elevation_gain'], 2, '.', ','),
                         'average_speed'=>number_format($activity['average_speed'], 2),
                         'max_speed'=>number_format($activity['max_speed'], 2),
                           'commute'=>$activity['commute'] ? 'Yes' : 'No' ,
                           'private'=>$activity['private'] ? 'Yes' : 'No' ,
                           'achievement_count'=>$activity['achievement_count']
                        ]);
                        $n+=1;
                    }
                    
                    
           
            }

            
        }
        Sync::create([
            'tipo'=>'PROGRAMADA',
            'entidad'=>'STRAVA_ACTIVITY',
            'fecha'=>Carbon::now(),
            'cantidad'=>$n
        ]);

     return Command::SUCCESS;

    }
}
