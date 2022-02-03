<?php

namespace App\Http\Controllers;

use App\Models\Filmmaker;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;

class HomeController extends Controller
{

    public function __invoke()
    {   
      
        $vehiculos = Vehiculo::where('status',4)
                            ->orwhere('status',5)
                            ->orwhere('status',7)
                            ->latest('id')->get()->take(4);

        $series = Serie::where('status',3)->latest('id')->get()->take(8);

        $socios = Socio::where('status',1)->latest('id')->get()->take(4);
    
       
        return view('welcome',compact('series','socios','vehiculos'));
        
    }
}
