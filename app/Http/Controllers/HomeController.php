<?php

namespace App\Http\Controllers;

use App\Models\Filmmaker;
use Illuminate\Http\Request;
use App\Models\Serie;

class HomeController extends Controller
{

    public function __invoke()
    {   
      

        $series = Serie::where('status',3)->latest('id')->get()->take(8);
    
       
        return view('welcome',compact('series'));
        
    }
}
