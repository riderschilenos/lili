<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;

class EliminarTicketsAntiguos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eliminar:tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
         // Obtener la fecha actual
         $now = now();



         $tickets = Ticket::whereHas('evento', function ($query) {
            $query->where('eliminable', 'si');
        })->where('created_at', '<', $now->subMinutes(10))->where('status', 1)->get();
 
         // Eliminar cada ticket
         foreach ($tickets as $ticket) {
             $ticket->delete();
             $this->info('Ticket eliminado: ' . $ticket->id);
         }
 
        return Command::SUCCESS;
    }
}
