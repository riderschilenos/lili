<?php

namespace App\Console\Commands;

use App\Models\Activitie;
use App\Models\AtletaStrava;
use App\Models\Evento;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Sync;
use App\Models\Ticket;
use App\Models\User;
use App\Models\WhatsappMensaje;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PremiacionDesafio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'premiacion:desafio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Premiacion de los desafios online';

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
    {    $atletas_stravas=AtletaStrava::all();
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
                     'total_elevation_gain'=>null,
                     'average_speed'=>number_format($activity['average_speed'], 2),
                     'max_speed'=>number_format($activity['max_speed'], 2),
                       'commute'=>$activity['commute'] ? 'Yes' : 'No' ,
                       'private'=>$activity['private'] ? 'Yes' : 'No' ,
                       'achievement_count'=>$activity['achievement_count']
                    ]);
                    $user=User::find($atletaStrava->user_id);
                    if ($user) {
                        $user->ForceFill([
                            'updated_at'=> Carbon::now()
                        ])->save();
                    }
                    
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
    $tickets=Ticket::where('status',3)->get();
        foreach ($tickets as $ticket) {
            if ($ticket->evento->type=='desafio') {
                if($ticket->user){
                    if ($ticket->user->activities){
                        $total=0;
                        foreach ($ticket->user->activities as $activitie){
                            $date1=date($activitie->start_date_local);
                            $date2=date($ticket->updated_at);

                            if ($date1>$date2){
                                $total+=floatval($activitie->distance);
                            }
                        }

                        if ($ticket->inscripcions) {
                            foreach ($ticket->inscripcions as $inscripcion) {
                                if ($inscripcion->fecha->name=='Etapa 15 km' && $inscripcion->estado<4) {
                                    if ($total>15) {
                                        if($inscripcion->estado==2){
                                            $inscripcion->estado=1;
                                            $inscripcion->save();
                                
                                            foreach($ticket->inscripcions as $inscripcion){
                                                if($inscripcion->estado==1){
                                                    $ticket->status=2;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    if ($ticket->user) {
                                                        $evento->inscritos()->detach($ticket->user->id);
                                                    }
                                                
                                
                                                }else{
                                                    $ticket->status=1;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    $evento->inscritos()->attach($ticket->user->id);
                                                    break;
                                                }
                                            }
                                        }else{
                                            $inscripcion->estado=4;
                                            $inscripcion->save();
                                            $pedido = Pedido::create([
                                                'user_id'=> $ticket->user->id,
                                                'transportista_id'=> 1,
                                                'pedidoable_id'=> $ticket->user->socio->id,
                                                'status'=> 4,
                                                'pedidoable_type'=> 'App\Models\Socio']);
                                            
                                            $orden= Orden::create([
                                                    'producto_id'=> 54,
                                                    'name'=>'Etapa 15 km',
                                                    'pedido_id'=>$pedido->id
                                                ]);
                                            try {
                                                $token = env('WS_TOKEN');
                                                $phoneid= env('WS_PHONEID');
                                                $version='v16.0';
                                                $url="https://riderschilenos.cl/";
                                                $wsload=[
                                                    'messaging_product' => 'whatsapp',
                                                    "preview_url"=> false,
                                                    'to'=>'56963176726',
                                                    
                                                    'type'=>'template',
                                                        'template'=>[
                                                            'name'=>'desafio_completado',
                                                            'language'=>[
                                                                'code'=>'es'],
                                                            'components'=>[ 
                                                                [
                                                                    'type'=>'body',
                                                                    'parameters'=>[
                                                                        [   //nombre
                                                                            'type'=>'text',
                                                                            'text'=> $ticket->user->name
                                                                        ],
                                                                        [   //nombre
                                                                            'type'=>'text',
                                                                            'text'=> $inscripcion->fecha->name
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]
                                                        
                                                    
                                                ];
                                                
                                                Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$wsload)->throw()->json();
                                            
                                            
                                            } catch (\Throwable $th) {
                                            
                                            }
                                
                                            foreach($ticket->inscripcions as $inscripcion){
                                                if($inscripcion->estado==4){
                                                    $ticket->status=4;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    if ($ticket->user) {
                                                        $evento->inscritos()->detach($ticket->user->id);
                                                    }
                                
                                                }else{
                                                    $ticket->status=3;
                                                    $ticket->save();
                                
                                                    $evento=Evento::find($ticket->evento_id);
                                                    $evento->inscritos()->attach($ticket->user->id);
                                                
                                                    break;
                                                }
                                            }

                                        }

                                        $fono='569'.substr(str_replace(' ', '', $ticket->user->socio->fono), -8);
                                        //TOKEN QUE NOS DA FACEBOOK
                                
                                        try {
                                            $token = env('WS_TOKEN');
                                            $phoneid= env('WS_PHONEID');
                                            $version='v16.0';
                                            $url="https://riderschilenos.cl/";
                                            $payload=[
                                                'messaging_product' => 'whatsapp',
                                                "preview_url"=> false,
                                                'to'=>$fono,
                                                
                                                'type'=>'template',
                                                    'template'=>[
                                                        'name'=>'desafio15_terminado',
                                                        'language'=>[
                                                            'code'=>'es'],
                                                    
                                                    ]
                                                
                                            ];
                                            
                                            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
                                            
                                            WhatsappMensaje::create(['numero'=> $fono,
                                            'mensaje'=>"¡Felicidades!
                                            Haz superado con éxito el desafio de 30Km ft. Strava",
                                            'type'=>'enviado']);
                                
                                
                                        } catch (\Throwable $th) {
                                            WhatsappMensaje::create(['numero'=> $fono,
                                            'mensaje'=>"ERROR al enviar Mentaje => ¡Felicidades!
                                            Haz superado con éxito el desafio de 30Km ft. Strava",
                                            'type'=>'enviado']);
                                        }

                                    }
                                }
                                if ($inscripcion->fecha->name=='Etapa 30 Km' && $inscripcion->estado<4) {
                                    if ($total>30) {
                                        if($inscripcion->estado==2){
                                            $inscripcion->estado=1;
                                            $inscripcion->save();
                                           
                                            foreach($ticket->inscripcions as $inscripcion){
                                                if($inscripcion->estado==1){
                                                    $ticket->status=2;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    if ($ticket->user) {
                                                        $evento->inscritos()->detach($ticket->user->id);
                                                    }
                                                
                                
                                                }else{
                                                    $ticket->status=1;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    $evento->inscritos()->attach($ticket->user->id);
                                                    break;
                                                }
                                            }
                                        }else{
                                            $inscripcion->estado=4;
                                            $inscripcion->save();
                                            $pedido = Pedido::create([
                                                'user_id'=> $ticket->user->id,
                                                'transportista_id'=> 1,
                                                'pedidoable_id'=> $ticket->user->socio->id,
                                                'status'=> 4,
                                                'pedidoable_type'=> 'App\Models\Socio']);
                                            
                                            $orden= Orden::create([
                                                    'producto_id'=> 55,
                                                    'name'=>'Etapa 30 km',
                                                    'pedido_id'=>$pedido->id
                                                ]);

                                            try {
                                                $token = env('WS_TOKEN');
                                                $phoneid= env('WS_PHONEID');
                                                $version='v16.0';
                                                $url="https://riderschilenos.cl/";
                                                $wsload=[
                                                    'messaging_product' => 'whatsapp',
                                                    "preview_url"=> false,
                                                    'to'=>'56963176726',
                                                    
                                                    'type'=>'template',
                                                        'template'=>[
                                                            'name'=>'desafio_completado',
                                                            'language'=>[
                                                                'code'=>'es'],
                                                            'components'=>[ 
                                                                [
                                                                    'type'=>'body',
                                                                    'parameters'=>[
                                                                        [   //nombre
                                                                            'type'=>'text',
                                                                            'text'=> $ticket->user->name
                                                                        ],
                                                                        [   //nombre
                                                                            'type'=>'text',
                                                                            'text'=> $inscripcion->fecha->name
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]
                                                        
                                                    
                                                ];
                                                
                                                Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$wsload)->throw()->json();
                                            
                                            
                                            } catch (\Throwable $th) {
                                            
                                            }
                                            foreach($ticket->inscripcions as $inscripcion){
                                                if($inscripcion->estado==4){
                                                    $ticket->status=4;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    if ($ticket->user) {
                                                        $evento->inscritos()->detach($ticket->user->id);
                                                    }
                                
                                                }else{
                                                    $ticket->status=3;
                                                    $ticket->save();
                                
                                                    $evento=Evento::find($ticket->evento_id);
                                                    $evento->inscritos()->attach($ticket->user->id);
                                                
                                                    break;
                                                }
                                            }
                                        }

                                        $fono='569'.substr(str_replace(' ', '', $ticket->user->socio->fono), -8);
                                        //TOKEN QUE NOS DA FACEBOOK
                                
                                        try {
                                            $token = env('WS_TOKEN');
                                            $phoneid= env('WS_PHONEID');
                                            $version='v16.0';
                                            $url="https://riderschilenos.cl/";
                                            $payload=[
                                                'messaging_product' => 'whatsapp',
                                                "preview_url"=> false,
                                                'to'=>$fono,
                                                
                                                'type'=>'template',
                                                    'template'=>[
                                                        'name'=>'desafio30_terminado',
                                                        'language'=>[
                                                            'code'=>'es'],
                                                    
                                                    ]
                                                
                                            ];
                                            
                                            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
                                            
                                            WhatsappMensaje::create(['numero'=> $fono,
                                            'mensaje'=>"¡Felicidades!
                                            Haz superado con éxito el desafio de 30Km ft. Strava",
                                            'type'=>'enviado']);
                                
                                
                                        } catch (\Throwable $th) {
                                            WhatsappMensaje::create(['numero'=> $fono,
                                            'mensaje'=>"ERROR al enviar Mentaje => ¡Felicidades!
                                            Haz superado con éxito el desafio de 30Km ft. Strava",
                                            'type'=>'enviado']);
                                        }

                                    }
                                }
                                if ($inscripcion->fecha->name=='Etapa 50Km' && $inscripcion->estado<4) {
                                    if ($total>50) {
                                        if($inscripcion->estado==2){
                                            $inscripcion->estado=1;
                                            $inscripcion->save();
                                           
                                            foreach($ticket->inscripcions as $inscripcion){
                                                if($inscripcion->estado==1){
                                                    $ticket->status=2;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    if ($ticket->user) {
                                                        $evento->inscritos()->detach($ticket->user->id);
                                                    }
                                                
                                
                                                }else{
                                                    $ticket->status=1;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    $evento->inscritos()->attach($ticket->user->id);
                                                    break;
                                                }
                                            }
                                        }else{
                                            $inscripcion->estado=4;
                                            $inscripcion->save();
                                            $pedido = Pedido::create([
                                                'user_id'=> $ticket->user->id,
                                                'transportista_id'=> 1,
                                                'pedidoable_id'=> $ticket->user->socio->id,
                                                'status'=> 4,
                                                'pedidoable_type'=> 'App\Models\Socio']);
                                            
                                            $orden= Orden::create([
                                                    'producto_id'=> 56,
                                                    'name'=>'Etapa 50 km',
                                                    'pedido_id'=>$pedido->id
                                                ]);

                                            try {
                                                $token = env('WS_TOKEN');
                                                $phoneid= env('WS_PHONEID');
                                                $version='v16.0';
                                                $url="https://riderschilenos.cl/";
                                                $wsload=[
                                                    'messaging_product' => 'whatsapp',
                                                    "preview_url"=> false,
                                                    'to'=>'56963176726',
                                                    
                                                    'type'=>'template',
                                                        'template'=>[
                                                            'name'=>'desafio_completado',
                                                            'language'=>[
                                                                'code'=>'es'],
                                                            'components'=>[ 
                                                                [
                                                                    'type'=>'body',
                                                                    'parameters'=>[
                                                                        [   //nombre
                                                                            'type'=>'text',
                                                                            'text'=> $ticket->user->name
                                                                        ],
                                                                        [   //nombre
                                                                            'type'=>'text',
                                                                            'text'=> $inscripcion->fecha->name
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]
                                                        
                                                    
                                                ];
                                                
                                                Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$wsload)->throw()->json();
                                            
                                            
                                            } catch (\Throwable $th) {
                                            
                                            }
                                            foreach($ticket->inscripcions as $inscripcion){
                                                if($inscripcion->estado==4){
                                                    $ticket->status=4;
                                                    $ticket->save();
                                                    $evento=Evento::find($ticket->evento_id);
                                                    if ($ticket->user) {
                                                        $evento->inscritos()->detach($ticket->user->id);
                                                    }
                                
                                                }else{
                                                    $ticket->status=3;
                                                    $ticket->save();
                                
                                                    $evento=Evento::find($ticket->evento_id);
                                                    $evento->inscritos()->attach($ticket->user->id);
                                                
                                                    break;
                                                }
                                            }
                                        }

                                        $fono='569'.substr(str_replace(' ', '', $ticket->user->socio->fono), -8);
                                        //TOKEN QUE NOS DA FACEBOOK
                                
                                        try {
                                            $token = env('WS_TOKEN');
                                            $phoneid= env('WS_PHONEID');
                                            $version='v16.0';
                                            $url="https://riderschilenos.cl/";
                                            $payload=[
                                                'messaging_product' => 'whatsapp',
                                                "preview_url"=> false,
                                                'to'=>$fono,
                                                
                                                'type'=>'template',
                                                    'template'=>[
                                                        'name'=>'desafio_terminado',
                                                        'language'=>[
                                                            'code'=>'es'],
                                                        'components'=>[ 
                                                            [
                                                                'type'=>'body',
                                                                'parameters'=>[
                                                                    [   //Socio
                                                                        'type'=>'text',
                                                                        'text'=> '50'
                                                                    ]
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                    
                                                
                                            ];
                                            
                                            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
                                            
                                            WhatsappMensaje::create(['numero'=> $fono,
                                            'mensaje'=>"¡Felicidades! Haz superado con éxito el desafio de 50Km ft. Strava",
                                            'type'=>'enviado']);
                                
                                
                                        } catch (\Throwable $th) {
                                            WhatsappMensaje::create(['numero'=> $fono,
                                            'mensaje'=>"ERROR al enviar Mentaje => ¡Felicidades!Haz superado con éxito el desafio de 30Km ft. Strava",
                                            'type'=>'enviado']);
                                        }

                                    }
                                }
                            }
                        }



                    }
                }
            }
        }
        return Command::SUCCESS;
   
    }
}
