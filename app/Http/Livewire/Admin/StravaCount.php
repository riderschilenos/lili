<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Component;

class StravaCount extends Component
{   public $ticket=null;
    public function mount(Ticket $ticket){
        $this->ticket=$ticket;
    }

    public function render()
    {
        return view('livewire.admin.strava-count');
    }
}
