<x-evento-layout>
    <x-slot name="tl">
            
        <title>Checkout {{$evento->titulo}}</title>
        @isset($evento->image)
            <link rel="shortcut icon" href="{{Storage::url($evento->image->url)}}">
        @else
            <link rel="shortcut icon" href="{{asset('img/logo.png')}}">
        @endisset
    </x-slot>
    
   
    @livewire('evento-checkout', ['evento' => $evento,'invitado'=>$invitado], key('evento-checkout.'.$evento->slug))
                
             


    
    <x-slot name="js">
        
        <script src="{{asset('js/socio/form.js')}}"></script>
          
        
    </x-slot>

</x-evento-layout>