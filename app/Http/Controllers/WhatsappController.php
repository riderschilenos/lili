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

        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9';
        //RETO QUE RECIBIREMOS DE FACEBOOK
        $palabraReto = $_GET['hub_challenge'];
        //TOQUEN DE VERIFICACION QUE RECIBIREMOS DE FACEBOOK
        $tokenVerificacion = $_GET['hub_verify_token'];
        //SI EL TOKEN QUE GENERAMOS ES EL MISMO QUE NOS ENVIA FACEBOOK RETORNAMOS EL RETO PARA VALIDAR QUE SOMOS NOSOTROS
        if ($token === $tokenVerificacion) {
            echo $palabraReto;
            exit;
        }
        /*
        * RECEPCION DE MENSAJES
        */
        //LEEMOS LOS DATOS ENVIADOS POR WHATSAPP
        $respuesta = file_get_contents("php://input");
        //CONVERTIMOS EL JSON EN ARRAY DE PHP
        $respuesta = json_decode($respuesta, true);
        //GUARDAMOS EL MENSAJE Y LA RESPUESTA EN EL ARCHIVO text.txt
        WhatsappMensaje::create(['numero'=>$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['from'],
                                'mensaje'=>$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body']
                                    ]);
        
    }
}
