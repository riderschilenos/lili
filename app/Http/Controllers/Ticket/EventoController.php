<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Precio;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Evento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pista_create()
    {
        $disciplinas= Disciplina::pluck('name','id');

        return view('pistas.create',compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {   $fechas= Fecha::where('evento_id',$evento->id)->paginate();
        
        $similares = Evento::where('disciplina_id',$evento->disciplina_id)
                            ->where('id','!=',$evento->id)
                            ->where('status',1)
                            ->latest('id')
                            ->take(5)
                            ->get();

        if(auth()->user())
        {   
            if(Ticket::where('evento_id',$evento->id)->where('user_id',auth()->user()->id)){    
                    $ticket = Ticket::where('evento_id',$evento->id)->where('user_id',auth()->user()->id)->first();
                }else{
                    $ticket =null;
                }             
        }
        else{
            $ticket =null;
        }        
          
        
        return view('Evento.show',compact('evento','fechas','similares','ticket'));
    }

    public function pistas()
    {       
        return view('Pistas.index');

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

    public function enrolled(Evento $evento){
        $evento->inscritos()->attach(auth()->user()->id);
        
        return redirect()->route('ticket.evento.show',$evento);
    }

    public function preticket(Evento $evento)
    {   
        $ticket=Ticket::where('user_id', auth()->user()->id)->where('evento_id',$evento->id)->first();

        if ($ticket){
            if ($ticket->status==2) {
                return redirect()->route('evento.view',$ticket->evento);
            }else{
                if($ticket->evento->inscritos->contains(auth()->user()->id)){
                    return redirect()->route('evento.view',$ticket->evento);
                }else{
                    return redirect(route('payment.checkout.ticket',$ticket).'/#pago');
                }
            }
           

        }else{
           
            return view('Evento.preticket',compact('evento'));
        }   
        
        
    }
}
