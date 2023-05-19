<?php

namespace App\Http\Controllers;

use App\Models\WhatsappMensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsappController extends Controller
{
    public function invitacion(Request $request){

        $num=$request->phone;
        
        $fono='569'.substr(str_replace(' ', '', $num), -8);
        //TOKEN QUE NOS DA FACEBOOK
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
        
        return redirect()->back();
    }

    public function webhook(Request $request){

        $requestBody = $request->getContent();

        // Convierte el cuerpo de la solicitud de JSON a un objeto PHP
        $requestData = json_decode($requestBody);
    
        // Verifica si se recibió un mensaje
        if (isset($requestData->messages)) {
            foreach ($requestData->messages as $message) {
                // Aquí puedes procesar el mensaje según tus necesidades
                $text = $message->body->text;
    
                // Realiza las acciones que desees con el mensaje recibido
                // Por ejemplo, puedes enviar una respuesta automática
                WhatsappMensaje::create(['numero'=> $message->from,
                'mensaje'=>$message->body->text
                    ]);

                }
            }
    

       
    }
}
