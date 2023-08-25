<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StravaController extends Controller
{
    public function handleAuthorization(Request $request)
    {
        $code = $request->query('code');

        // Intercambio de código por token de acceso usando Guzzle
        $client = new Client();
        $response = $client->post('https://www.strava.com/oauth/token', [
            'form_params' => [
                'client_id' => '112140',
                'client_secret' => '98c53de9ac1f72b3e0343b6130ff7442ac0b3f6f',
                'code' => $code,
                'grant_type' => 'authorization_code',
            ],
        ]);

        $data = json_decode($response->getBody(), true);


        

        // Aquí puedes guardar el token de acceso en la base de datos u otra acción
        // $data['access_token'] contiene el token de acceso que puedes utilizar para acceder a la API de Strava

        return redirect()->route('home');
    }
}
