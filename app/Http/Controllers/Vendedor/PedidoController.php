<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Platform;
use App\Models\Socio;
use App\Models\Transportista;
use Illuminate\Http\Request;

class PedidoController extends Controller
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

    {   $transportistas = Transportista::pluck('name','id');
        

        return view('vendedor.pedidos.create',compact('transportistas'));
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
        'transportista_id'=>'required'
        ]);}
        else{
            $request->validate([
                'transportista_id'=>'required'
                ]);
        }

        if($request->pedidoable_type == 'App\Models\Invitado'){
                $invitado =  Invitado::create([
                                'name'=> $request->name,
                                'rut'=> $request->rut,
                                'fono'=> $request->fono,
                                'email'=>$request->email]);
                            
                $pedido = Pedido::create([
                    'user_id'=> $request->user_id,
                    'transportista_id'=> $request->transportista_id,
                    'pedidoable_id'=> $invitado->id,
                    'pedidoable_type'=> $request->pedidoable_type]);
            }
        else{
            $pedido = Pedido::create([
                'user_id'=> $request->user_id,
                'transportista_id'=> $request->transportista_id,
                'pedidoable_id'=> $request->pedidoable_id,
                'pedidoable_type'=> $request->pedidoable_type]);
        }

        return redirect()->route('vendedor.pedidos.edit',$pedido);
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

    public function seguimiento(Pedido $pedido)
    {   
        if(auth()->user()){
            return view('vendedor.pedidos.seguimiento',compact('pedido'));
        }else{
            return view('vendedor.pedidos.seguimientopublic',compact('pedido'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $invitados=Invitado::all();

        $socios=Socio::all();

        return view('vendedor.pedidos.edit',compact('pedido','invitados','socios'));
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
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('vendedor.home.index')->with('info','El pedido se elimino con éxito.');

    }

    public function close(Pedido $pedido){
        $pedido->status = 2;
        $pedido->save();

        return redirect()->route('vendedor.pedidos.prepay');
    }
}
