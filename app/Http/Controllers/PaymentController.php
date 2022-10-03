<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Pago;
use App\Models\Qrregister;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Suscripcion;
use App\Models\Ticket;
use App\Models\Vehiculo;
use App\Models\Vendedor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Serie $serie){

        return view('payment.checkout',compact('serie'));
    }

    public function checkoutevento(Evento $evento){

        return view('payment.checkoutevento',compact('evento'));
    }

    

    public function serie(Serie $serie, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $serie->sponsors()->attach(auth()->user()->id);
            return redirect()->route('series.status',$serie);
        }
        else{
            
        }

        

      
    }

    public function ticket(Ticket $ticket, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $ticket->status=2;
            $ticket->save();
            return redirect()->route('ticket.enrolled',$ticket);
        }
        else{
           
        }
    }

    public function socio(Socio $socio, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $socio->status=1;
            $socio->save();

            $sus = Suscripcion::create([
                'suscripcionable_type'=>'App\Models\Socio',
                'suscripcionable_id'=>$socio->id,
                'precio'=>25000,
                'end_date'=>date('Y-m-d', strtotime(Carbon::now()."+ 1 year"))
            ]);

            return redirect()->route('socio.create');
        }
        else{
            
        }

    }
    public function vendedor(Vendedor $vendedor, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $vendedor->status=2;
            $vendedor->save();

            $sus = Suscripcion::create([
                'suscripcionable_type'=>'App\Models\Vendedor',
                'suscripcionable_id'=>$vendedor->id,
                'precio'=>14990,
                'end_date'=>date('Y-m-d', strtotime(Carbon::now()."+ 10 year"))
            ]);

            return redirect()->route('vendedores.index');
        }
        else{
            
        }

    }

    public function pago(Pago $pago, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $pago->estado=2;
            $pago->save();
            foreach ($pago->pedidos as $pedido){
                $pedido->status=4;
                $pedido->save();
            }

            return redirect()->route('vendedor.pedidos.prepay');
        }
        else{
            
        }

    }

    public function vehiculo(Vehiculo $vehiculo, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $vehiculo->status=4;
            $vehiculo->save();

            return redirect()->route('garage.usados');
        }
        else{
            
        }

        

      
    }

    public function vehiculoinsc(Vehiculo $vehiculo, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $vehiculo->status=6;
            if($vehiculo->insc==2){
                $value=5000;
            }else{
                $value=10000;
            }

            $qr=Qrregister::factory(1)->create([
                'value'=>$value,
                'active_date'=>Carbon::now()
            ]);

            $vehiculo->slug=$qr->first()->slug;

            $vehiculo->save();

            return redirect()->route('garage.inscripcion',$vehiculo);
        }
        else{
            
        }

        

      
    }


    public function vehiculodown(Vehiculo $vehiculo, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $vehiculo->status=1;
            $vehiculo->save();

            return redirect()->route('garage.vehiculos.index');
        }
        else{
            
        }

        

      
    }

    


}
