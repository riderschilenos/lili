<x-app-layout>

    <x-slot name="pedido">
        {{$pedido->id}}
    </x-slot>

    <div class="container pt-8" >

        @livewire('vendedor.pedido-seguimiento', ['pedido' => $pedido], key('pedido-seguimiento.'.$pedido->id))

    </div>

</x-app-layout> 