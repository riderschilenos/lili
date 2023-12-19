<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socio;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SocioController extends Controller
{
    public function index() 
    {
        return view('admin.socios.index');
    }

    public function show(Socio $socio) 
    {   
        $slug=$socio->slug;
        
        QrCode::format('svg')->size('120')->generate('https://riderschilenos.cl/'.$slug, '../public/storage/qrcodes/'.$slug.'.svg');

        return view('admin.socios.show',compact('socio'));
    }
}
