<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Invitado;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->pedidoable_type=='App\Models\Invitado'){
            $request->validate([
            'name'=>'required',
            'rut'=>'required',
            'fono'=>'required',
            'email'=>'required',
            ]);}
            else{
                $request->validate([
                    'seleccionable'=>'required'
                    ]);
            }
    
            if($request->pedidoable_type == 'App\Models\Invitado'){
                    $invitado =  Invitado::create([
                                    'name'=> $request->name,
                                    'rut'=> $request->rut,
                                    'fono'=> $request->fono,
                                    'email'=>$request->email]);
                                
                    $ticket = Ticket::create([
                        'user_id'=> $request->user_id,
                        'evento_id'=> $request->evento_id,
                        'ticketable_id'=> $invitado->id,
                        'ticketable_type'=> $request->pedidoable_type]);
                    
                    return redirect()->back();
                }
            else{
                
                

                $ticket = Ticket::create([
                    'user_id'=> $request->user_id,
                    'evento_id'=> $request->evento_id,
                    'ticketable_id'=> $request->pedidoable_id,
                    'ticketable_type'=> $request->pedidoable_type]);
                
                
                QrCode::format('svg')->size('300')->generate('https://riderschilenos.cl/ticket/view/'.$ticket->id, '../public/storage/qrcodes/cod'.$ticket->id.'.svg');
                
                $ticket->update(['qr'=>'qrcodes/cod'.$ticket->id.'.svg']);
                $ticket->save();
                
                $evento=Evento::find($request->evento_id);

                return redirect(route('payment.checkout.ticket',$ticket).'/#pago');
            }
    
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function enrolled(Ticket $ticket){
        $ticket->inscripcion=0;
        $ticket->save();
        foreach($ticket->inscripcions() as $inscripcion){
            $inscripcion->cantidad=0;
            $inscripcion->save();
        }
        $evento=Evento::find($ticket->evento_id);
        $evento->inscritos()->attach(auth()->user()->id);
        
        return redirect()->route('ticket.view',$ticket);
    }

    public function semipago(Ticket $ticket){
        
        $ticket->status=3;
        $ticket->save();
        foreach ($ticket->inscripcions as $inscripcion){
            $inscripcion->estado=3;
            $inscripcion->save();
        }  

        $evento=Evento::find($ticket->evento_id);
        $evento->inscritos()->attach(auth()->user()->id);

                 //TOKEN QUE NOS DA FACEBOOK
        $token = env('WS_TOKEN');
        $phoneid='100799979656074';
        $version='v16.0';
        $url="https://riderschilenos.cl/";
        $payload=[
            'messaging_product' => 'whatsapp',
            "preview_url"=> false,
            'to'=>'56963176726',
            
            'type'=>'template',
                'template'=>[
                    'name'=>'nuevo_pedido',
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
                                [   //vendedor
                                    'type'=>'text',
                                    'text'=> 'Pista MARIOCROSS'
                                ],
                                [   //Cantidad
                                    'type'=>'text',
                                    'text'=> '$'.number_format($ticket->inscripcion)
                                ]
                            ]
                        ]
                    ]
                ]
                
            
            
            /*
            "text"=>[
                "body"=> "Buena Rider, Bienvenido al club"
             ]*/
        ];
        
        Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();

            
        return redirect()->route('ticket.view',$ticket);
       
        
       
    }


}
