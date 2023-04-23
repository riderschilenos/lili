<?php

namespace App\Http\Controllers;

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
                
            
            /*
            
            "text"=>[
                "body"=> "Buena Rider, Bienvenido al club"
             ]*/
        ];
        
        Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
        
        return redirect()->back();
    }
}
