<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Http\Request;

class DisenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pedidos=Pedido::where('status',3)
                ->orwhere('status',4)
                ->orwhere('status',5)
                ->paginate(100);
        
        $users=User::all();

        $invitados= Invitado::all();
        $socios= Socio::all();

        return view('admin.disenos.index',compact('pedidos','users','invitados','socios'));
    }

    public function indexproduccion()
    {   
        $pedidos=Pedido::where('status',3)
                ->orwhere('status',4)
                ->orwhere('status',5)
                ->paginate(100);
        
        $users=User::all();

        $invitados= Invitado::all();
        $socios= Socio::all();

        return view('admin.disenos.produccion',compact('pedidos','users','invitados','socios'));
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
        //
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
