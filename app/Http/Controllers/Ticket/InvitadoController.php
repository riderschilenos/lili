<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Invitado;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InvitadoController extends Controller
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
                    'email'=>'required'
                    ]);
        }
        if($request->pedidoable_type=='Pendiente'){
                $request->validate([
                    'name'=>'required',
                    'last_name'=>'required',
                    'born_date'=>'required',
                    'rut'=>'required',
                    'disciplina_id'=>'required',
                    'email'=>'required'
                    ]);
        }

        $evento=Evento::find($request->evento_id);

            if($request->pedidoable_type == 'App\Models\Invitado'){
                
            
                $invitado =  Invitado::create([
                                'name'=> $request->name,
                                'rut'=> $request->rut,
                                'fono'=> $request->fono,
                                'email'=>$request->email]);
                            
              

                return redirect()->route('checkout.evento.invitado',compact('evento','invitado'));
                
        
            }
            if($request->pedidoable_type == 'Pendiente'){

                $sociosall=Socio::all();

                $fecha_nacimiento = $request->born_date; // Asumiendo que $request->born_date contiene la fecha en algún formato reconocido por PHP

                // Obtener el año de la fecha
                $ano = date('Y', strtotime($fecha_nacimiento));

                $user=User::create([
                    'name'=> $request->name.' '.$request->second_name.' '.$request->last_name,
                    'email'=> $request->email,
                    'password' => Hash::make($ano),
                ]);

                $socio=Socio::create([
                    'name'=> $request->name,
                    'second_name'=> $request->second_name,
                    'last_name'=> $request->last_name,
                    'slug'=> 'rider'.$sociosall->count(),
                    'born_date'=> $request->born_date,
                    'fono'=> $request->fono,
                    'rut'=> $request->rut,
                    'disciplina_id'=> $request->disciplina_id,
                    'user_id'=> $user->id]);
                            
              

                return redirect()->route('checkout.evento.socio',compact('evento','socio'));
                
        
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
}
