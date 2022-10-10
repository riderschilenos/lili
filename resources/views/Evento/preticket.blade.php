<x-evento-layout>

    
    @livewire('evento-checkout', ['evento' => $evento], key('evento-checkout.'.$evento->id))
                


    
    <x-slot name="js">
        
        <script src="{{asset('js/socio/form.js')}}"></script>
          
        
    </x-slot>

</x-evento-layout>