<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Inscripcion;
use App\Models\Ticket;
use Illuminate\Http\Request;

class InscripcionController extends Controller
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
          
        $inscripcion = Inscripcion::create($request->all());
        $ticket= Ticket::find($request->ticket_id);

        return redirect(route('payment.checkout.ticket',$ticket).'/#pago');

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
    public function update(Request $request, Inscripcion $inscripcion)
    {   if($inscripcion->estado==1){
            $inscripcion->estado=0;
            $inscripcion->save();
        }
        $inscripcion->estado=3;
        $inscripcion->save();
        return redirect()->route('ticket.view',$inscripcion->ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscripcion $inscripcion,Request $request)
    {
        $inscripcion->delete();
        $ticket= Ticket::find($request->ticket_id);

        $alfa=0;     


        foreach ($ticket->evento->fechas as $fecha)   {                                                   
            foreach ($fecha->categorias as $const){
                foreach($const->inscripcions as $inscripcion){
                
                        $alfa+=$inscripcion->fecha_categoria->inscripcion;

                    }
                }
            }  
        
            $ticket->inscripcion=$alfa;


            $ticket->save();

        //return redirect()->route('checkout.evento',$evento);
        return redirect(route('payment.checkout.ticket',$ticket).'/#pago');
     
    }
}
