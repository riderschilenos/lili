<?php

namespace App\Policies;

use App\Models\Socio;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocioPolicy
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

    public function asociado(User $user, Socio $socio){
        return $socio->user->contains($user->id);
    }
}
