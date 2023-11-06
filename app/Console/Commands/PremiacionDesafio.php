<?php

namespace App\Console\Commands;

use App\Models\Evento;
use App\Models\Ticket;
use App\Models\WhatsappMensaje;
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
    {   $tickets=Ticket::where('type','desafio')->where('status',3)->get();
        foreach ($tickets as $ticket) {
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
                        if ($inscripcion->fecha->name=='Etapa 30 Km') {
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
                    }
                }



            }
        }

        return Command::SUCCESS;
   
    }
}
