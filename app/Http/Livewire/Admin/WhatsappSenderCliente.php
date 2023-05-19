<?php

namespace App\Http\Livewire\Admin;

use App\Models\WhatsappMensaje;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WhatsappSenderCliente extends Component
{   public $nro;

    public function render()
    {
        return view('livewire.admin.whatsapp-sender-cliente');
    }

    public function invitacion(){
        
        
        $fono='569'.substr(str_replace(' ', '', $this->nro), -8);
        //TOKEN QUE NOS DA FACEBOOK

        try {
            $token = env('WS_TOKEN');
            $phoneid= env('WS_PHONEID');
            $version='v16.0';
            $url="https://riderschilenos.cl/";
            $payload=[
                'messaging_product' => 'whatsapp',
                "preview_url"=> false,
                'to'=>$fono,
                
                'type'=>'template',
                    'template'=>[
                        'name'=>'invitacion_de_registro',
                        'language'=>[
                            'code'=>'es'],
                    
                    ]
                
            ];
            
            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
            
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"Hola!! Hazte parte de la comunidad de RidersChilenos y aprovechar todos los beneficios de nuestra plataforma web, la cual es completamente gratuita y te permitirá registrar tu moto y/o bicicleta de una manera fácil y rápida, para mantener un registro online de mantenciones y servicios.
            Además, tendrás acceso a diferentes beneficios, como cupones de descuento en tiendas de bicicletas y motocicletas, ofertas exclusivas en productos y mucho más.
            Si estás interesado en registrarte y comenzar a disfrutar de todos estos beneficios, haz clic en el siguiente enlace y sigue los pasos para crear tu cuenta.
            https://riderschilenos.cl/register",
            'type'=>'enviado']);


        } catch (\Throwable $th) {
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"ERROR al enviar Mentaje => Hola!! Hazte parte de la comunidad de RidersChilenos y aprovechar todos los beneficios de nuestra plataforma web, la cual es completamente gratuita y te permitirá registrar tu moto y/o bicicleta de una manera fácil y rápida, para mantener un registro online de mantenciones y servicios.
            Además, tendrás acceso a diferentes beneficios, como cupones de descuento en tiendas de bicicletas y motocicletas, ofertas exclusivas en productos y mucho más.
            Si estás interesado en registrarte y comenzar a disfrutar de todos estos beneficios, haz clic en el siguiente enlace y sigue los pasos para crear tu cuenta.
            https://riderschilenos.cl/register",
            'type'=>'enviado']);
        }
    }

    public function carcasas(){
        
    }

    public function accesorios(){
        
    }
}
