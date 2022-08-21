<x-ticket-layout :evento="$evento">

    


    <h1 class="text-2xl font-bold"> 
        @if ($evento->type=='carrera')
        Fecha y Categorias
        @else
        Fechas y Categorias
        @endif
    </h1>
    <hr class="mt-2 mb-6">

        @livewire('organizador.fecha-categorias', ['fecha' => $fecha], key($fecha->id))
    

</x-ticket-layout>


