<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Filmmaker;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;

class HomeController extends Controller
{

    public function __invoke()
    {   
      
        $autos = Vehiculo::where('status',4)
        ->orwhere('status',5)
        ->orwhere('status',7)
        ->latest('id')->get()->take(3);

        $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);

        $riders = Socio::where('status',1)->latest('id')->get()->take(4);

       

        return view('welcome',compact('series','riders','autos'));
        
    }
}
