<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function login(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){

        $user = Socialite::driver('google')->user();
    
        $userExists = User::where('external_id',$user->id)->where('external_auth','google')->first();

        if($userExists){
            Auth::login($userExists);
        }else{
            $userNew=User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'avatar'=>$user->avatar,
                'external_id'=>$user->id,
                'external_auth'=>'google'
            ]);
            Auth::login($userNew);
        }
        // $user->token
    }
}
