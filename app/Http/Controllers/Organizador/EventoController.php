<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Precio;
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
        return view('organizador.eventos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas= Disciplina::pluck('name','id');

        $precios= Precio::pluck('name','id');

        return view('organizador.eventos.create',compact('disciplinas','precios'));
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
            'titulo'=>'required',
            'subtitulo'=>'required',
            'descripcion'=>'required',
            'slug'=>'required|unique:eventos',
            'fecha'=>'required',
            'ubicacion'=>'required',
            'disciplina_id'=>'required',
            'file'=>'image'

        ]);

        $serie = Evento::create($request->all());


        if($request->file('file')){
            $url = Storage::put('series',$request->file('file'));

            $serie->image()->create([
                'url'=>$url
            ]);
        }
        return redirect()->route('filmmaker.series.edit',$serie);


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
