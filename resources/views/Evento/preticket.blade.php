<x-evento-layout>

    
    @livewire('evento-checkout', ['evento' => $evento], key('evento-checkout.'.$evento->slug))
                


    
    <x-slot name="js">
        
        <script src="{{asset('js/socio/form.js')}}"></script>
          
        
    </x-slot>

</x-evento-layout>