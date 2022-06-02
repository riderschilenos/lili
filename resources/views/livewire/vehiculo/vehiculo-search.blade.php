<div>

    <div class="px-6 py-4">
        <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre del dueño" autocomplete="off">
    </div>
    @if($vehiculos->count())
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($vehiculos as $vehiculo)
                @if($vehiculo->status==5)
                    <x-mivehiculo-card :vehiculo="$vehiculo" />        
                @endif
            @endforeach
    
        </div>
    
    @else
        <div class="px-6 py-4 text-center">
            No hay ningun registro de vehiculo en venta
        </div>
        
    @endif
    
        <div class="px-6 py-4">
            {{$vehiculos->links()}}
        </div>
  
        
</div>
