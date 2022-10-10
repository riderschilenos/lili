<x-evento-layout :evento="$evento">

    @livewire('evento-checkout', ['evento' => $evento], key($evento->id))

    


    
    <x-slot name="js">
        
        <script src="{{asset('js/socio/form.js')}}"></script>
          
        
    </x-slot>

</x-evento-layout>