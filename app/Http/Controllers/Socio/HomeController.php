<?php

namespace App\Http\Controllers\Socio;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Socio;
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
        return view('socio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $socios= Socio::all();

        return view('socio.create',compact('socios'));
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
            'name'=>'required',
            'last_name'=>'required',
            'born_date'=>'required',
            'prevision'=>'required',
            'rut'=>'required',
            'nro'=>'required',
            'disciplina_id'=>'required'
            ]);
    
            
        Socio::create([
                    'name'=> $request->name,
                    'second_name'=> $request->second_name,
                    'last_name'=> $request->last_name,
                    'slug'=> $request->slug,
                    'born_date'=> $request->born_date,
                    'prevision'=> $request->prevision,
                    'fono'=> $request->fono,
                    'rut'=> $request->rut,
                    'nro'=> $request->nro,
                    'disciplina_id'=> $request->disciplina_id,
                    'user_id'=> $request->user_id]);
            
    
        return redirect()->route('socio.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {
        return view('socio.show',compact('socio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Socio $socio)
    {   
        $disciplinas=Disciplina::pluck('name','id');

        return view('socio.edit',compact('socio','disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socio $socio)
    {
        

        $socio->update($request->all());

        return redirect()->route('socio.edit',$socio)->with('info','La disciplina se actualizo con éxito.');

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
