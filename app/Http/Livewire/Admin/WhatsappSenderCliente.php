<?php

namespace App\Http\Livewire\Admin;

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
            
            return redirect()->back();

        } catch (\Throwable $th) {
             return redirect()->back();
        }
    }

    public function carcasas(){
        
    }

    public function accesorios(){
        
    }
}
