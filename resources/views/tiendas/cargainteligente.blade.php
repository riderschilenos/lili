<x-tienda-layout :tienda="$tienda">
         <main>
            @livewire('tienda.producto-inteligente',['producto'=>null,'tienda'=>$tienda->id])
          
         </main>
</x-tienda-layout>