<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Serie $serie){

        return view('payment.checkout',compact('serie'));
    }

    

    public function serie(Serie $serie, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-8905249143413936-011117-dffe1a66c367246ec8bd92d5e2afbc78-1055006538");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $serie->sponsors()->attach(auth()->user()->id);
            return redirect()->route('series.status',$serie);
        }
        else{
            
        }

        

      
    }
    public function socio(Socio $socio, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-8905249143413936-011117-dffe1a66c367246ec8bd92d5e2afbc78-1055006538");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $socio->status=1;
            $socio->save();

            return redirect()->route('socio.create');
        }
        else{
            
        }

        

      
    }
}
