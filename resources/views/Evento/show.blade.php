<x-evento-layout :evento="$evento">
    

    @livewire('ticket.evento-show', ['evento' => $evento], key($evento->id))

</x-evento-layout>