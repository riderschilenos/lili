<x-tienda-layout :tienda="$tienda">
    <!-- This is an example component -->
<!-- This is an example component -->

            <main>
                @livewire('tienda.tienda-dashboard',['tienda'=>$tienda->id])
            </main>

</x-tienda-layout>