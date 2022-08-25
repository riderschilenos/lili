<x-evento-layout :evento="$evento">

    @livewire('evento-checkout', ['evento' => $evento], key($evento->id))

  
</x-evento-layout>