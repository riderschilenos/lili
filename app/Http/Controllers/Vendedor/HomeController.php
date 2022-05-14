<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (auth()->user()) {

            if (auth()->user()->vendedor) {

                if(auth()->user()->vendedor->estado==2){
                    return view('vendedor.pedidos.index');
                }else{
                    $disciplinas= Disciplina::pluck('name','id');
                    return view('vendedor.create',compact('disciplinas'));
                }
            }else{
                $disciplinas= Disciplina::pluck('name','id');
                return view('vendedor.create',compact('disciplinas'));
            }
            
        }else{
            $disciplinas= Disciplina::pluck('name','id');
             return view('vendedor.create',compact('disciplinas'));
        }
        
    }

    public function prepay()
    {   
                       
        
        return view('vendedor.pedidos.prepay');
    }

    public function comisiones()
    {                  
        
        return view('vendedor.pedidos.comisiones');
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
            'nro_cuenta'=>'required',
            'tipo_cuenta'=>'required',
            'rut'=>'required',
            'banco'=>'required',
            'name'=>'required',
            'fono'=>'required',
            'disciplina_id'=>'required',
            'localidad'=>'required',
        ]);

        $Vendedor = Vendedor::create([
            'nro_cuenta'=>$request->nro_cuenta,
            'tipo_cuenta'=>$request->tipo_cuenta,
            'rut'=>$request->rut,
            'banco'=>$request->banco,
            'user_id'=>$request->user_id,
            'biografia'=>'-',
            'name'=>$request->name,
            'fono'=>$request->fono,
            'disciplina_id'=>$request->disciplina_id,
            'localidad'=>$request->localidad,

        ]);

        return redirect()->route('vendedor.home.index');
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
