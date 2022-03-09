<x-vendedor-layout>

    <x-slot name="pedido">
        {{$pedido->id}}
    </x-slot>

    @livewire('vendedor.pedido-seguimiento', ['pedido' => $pedido], key('pedido-seguimiento.'.$pedido->id))


</x-vendedor-layout> 