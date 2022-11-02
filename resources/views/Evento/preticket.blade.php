<x-evento-layout>

    
    {{-- comment @livewire('evento-checkout', ['evento' => $evento], key('evento-checkout.'.$evento->slug)) --}}
    @livewire('evento-checkout', ['evento' => $evento], key($evento->slug))
                


    
    <x-slot name="js">
        
        <script src="{{asset('js/socio/form.js')}}"></script>
          
        
    </x-slot>

</x-evento-layout>