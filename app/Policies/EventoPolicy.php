<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Evento $evento){
        return $evento->inscritos->contains($user->id);
    }

    public function ticketed(User $user, Evento $evento){

        if (Ticket::where('user_id', $user->id)->where('evento_id',$evento->id)->count()){
            return false;
        }else{
            return true;
        }   
       
    }

    
}
