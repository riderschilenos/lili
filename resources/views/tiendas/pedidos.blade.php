<x-tienda-layout :tienda="$tienda">
         <main>
            @livewire('tienda.productos-search',['tienda'=>$tienda->id])
         </main>
</x-tienda-layout>