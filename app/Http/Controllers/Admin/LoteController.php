<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lote;
use App\Models\Orden;
use Illuminate\Http\Request;

class LoteController extends Controller
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
        $request->validate([
            'lote'=>'required',
            'user_id'=>'required'
            ]);
        

        $lote=Lote::create([
                'user_id'=> $request->user_id
                ]);

        $url = $request->file('lote')->store('lote');
        $lote->resource()->create([
                    'url'=>$url
                ]);
        
        foreach ($request->selected as $item){
            $lote->ordens()->attach($item);
            $orden = Orden::find($item);
            $orden->status = 2;
            $orden->save();
        }

        foreach ($request->selected as $item){
            $orden = Orden::find($item);
            foreach($orden->pedido->ordens as $orden){

                if($orden->status==2 || $orden->status==3){
                    $orden->pedido->status=5;
                    $orden->pedido->save();
    
                }else{
                    $orden->pedido->status=4;
                    $orden->pedido->save();
                    break;
                }

            } 

        }
        
        return redirect()->route('admin.disenos.index');
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
