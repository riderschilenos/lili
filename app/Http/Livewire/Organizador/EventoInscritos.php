<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Evento;
use App\Models\Inscripcion;
use App\Models\Invitado;
use App\Models\Retiro;
use App\Models\Socio;
use App\Models\Ticket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class EventoInscritos extends Component
{   
    use WithPagination;

    use AuthorizesRequests;

    public $evento,$search;

    public function mount(Evento $evento){
        
        $this->evento=$evento;


    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   $tickets=Ticket::where('evento_id',$this->evento->id)->get();
        $socios=Socio::all();
        $invitados=Invitado::all();
        $sponsors = $this->evento->inscritos()->where('name','LIKE','%'. $this->search .'%')->get();

        $inscripciones = Inscripcion::join('tickets','inscripcions.ticket_id','=','tickets.id')
                            ->select('inscripcions.*','tickets.evento_id')
                            ->where('evento_id',$this->evento->id)
                            ->where('estado','>=',1)
                            ->orderby('categoria_id','DESC')
                            ->paginate(50);

        return view('livewire.organizador.evento-inscritos',compact('sponsors','inscripciones','tickets','socios','invitados'));
    }

    public function pagomanual(Ticket $ticket){

        $ticket->status=3;
        $ticket->save();
        foreach ($ticket->inscripcions as $inscripcion){
            $inscripcion->estado=3;
            $inscripcion->save();
        }  

        $evento=Evento::find($ticket->evento_id);
        $user=Evento::find($ticket->user_id);

        if ($user) {
            $evento->inscritos()->attach($user->id);
        }
        
        
        $tickets=$ticket->evento->tickets()->where('status','>=',3)->get();
        $retiros = Retiro::where('evento_id',$ticket->evento->id)->get();

        $total=0;
        $retiroacumulado=0;

        foreach ($retiros as $retiro){
                $retiroacumulado+=$retiro->cantidad;
        }
            

    

            foreach ($tickets as $ticket){
                    if($ticket->status>=3){
                            $total+=$ticket->inscripcion;
                    }
                
                }

        try {

                //
                    //TOKEN QUE NOS DA FACEBOOK
                    $cell='569'.substr(str_replace(' ', '', $ticket->evento->user->vendedor->fono), -8);
            
                    //TOKEN QUE NOS DA FACEBOOK
                    $token = env('WS_TOKEN');
                    $phoneid= env('WS_PHONEID');
                    $version='v16.0';
                    $url="https://riderschilenos.cl/";
                    $payload=[
                    'messaging_product' => 'whatsapp',
                    "preview_url"=> false,
                    'to'=>$cell,
                    
                    'type'=>'template',
                        'template'=>[
                            'name'=>'entrada_vendida',
                            'language'=>[
                                'code'=>'es'],
                            'components'=>[ 
                                [
                                    'type'=>'body',
                                    'parameters'=>[
                                        [   //cliente
                                            'type'=>'text',
                                            'text'=> $ticket->user->name
                                        ],
                                        [   //Cantidad
                                            'type'=>'text',
                                            'text'=> '$'.number_format($ticket->inscripcion)
                                        ],
                                        [   //saldo
                                            'type'=>'text',
                                            'text'=> '$'.number_format($total*0.931-$retiroacumulado)
                                        ],
                                        
                                    ]
                                ]
                            ]
                        ]
                    
                    ];
        
                    Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
                //
                if ($ticket->user) {
                 
                    $fono='569'.substr(str_replace(' ', '', $ticket->user->socio->fono), -8);
                    $token = env('WS_TOKEN');
                    $phoneid= env('WS_PHONEID');
                    $version='v16.0';
                    $url="https://riderschilenos.cl/";
                    $wsload=[
                        'messaging_product' => 'whatsapp',
                        "preview_url"=> false,
                        'to'=>$fono,
                        'type'=>'template',
                            'template'=>[
                                'name'=>'entrada_comprada',
                                'language'=>[
                                    'code'=>'es'],
                                'components'=>[ 
                                    [
                                        'type'=>'body',
                                        'parameters'=>[
                                            [   //pista
                                                'type'=>'text',
                                                'text'=> $ticket->evento->titulo
                                            ],
                                            [   //Socio
                                                'type'=>'text',
                                                'text'=> 'https://riderschilenos.cl/ticket/view/'.$ticket->id
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                            
                        
                    ];
                    
                    Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$wsload)->throw()->json();
                    
                }
            
            
        } catch (\Throwable $th) {
            
        
        }
        
    }

}
