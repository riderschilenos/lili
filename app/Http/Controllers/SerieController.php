<?php

namespace App\Http\Controllers;

use App\Models\Filmmaker;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Video;

class SerieController extends Controller
{
    public function index(){
        return view('serie.index');
    }

    public function show(Serie $serie){

        $this->authorize('published',$serie);
        
        $videos= Video::where('serie_id',$serie->id)
                        ->paginate();
        $similares = Serie::where('disciplina_id',$serie->disciplina_id)
                            ->where('id','!=',$serie->id)
                            ->where('status',3)
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('serie.show',compact('serie','videos','similares'));
    }

    public function enrolled(Serie $serie){
        $serie->sponsors()->attach(auth()->user()->id);

        return redirect()->route('series.status',$serie);
    }




}
