<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Invitado;
use App\Models\Ticket;
use Illuminate\Http\Request;

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
                
                $evento=Evento::find($request->evento_id);

                return redirect(route('checkout.evento',$evento).'/#pago');
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
        $evento=Evento::find($ticket->evento_id);
        $evento->inscritos()->attach(auth()->user()->id);
        
        return redirect()->route('ticket.evento.show',$evento);
    }


}
