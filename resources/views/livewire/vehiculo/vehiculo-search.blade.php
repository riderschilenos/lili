<div>
    @php

    $motos=0;
    $bicicletas=0;

        foreach ($vehiculos as $vehiculo) {
            if ($vehiculo->status==5) {
                if ($vehiculo->vehiculo_type->id==9 or $vehiculo->vehiculo_type->id==10 or $vehiculo->vehiculo_type->id==11 ) {
                    $bicicletas+=1;}
                else {
                    $motos+=1;
                
                }    
            }
        }


    @endphp

<div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-x-4">
                
    <div>

    </div>
   
    <div class="hidden sm:block">
        <div class="flex justify-end mr-4 ">

            
            <div class="grid grid-cols-3 gap-3">
                    <button class="btn bg-gray-800 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas+$motos}}</button>
                    <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}} MOTOS</button>
                    <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas}} BICICLETAS</button>
                   
            </div>
            

        </div>
    </div>
    <div class="block sm:hidden">
        <div class="flex justify-center ">

            
                
                <button class="btn bg-gray-800 text-white w-full max-w-xs items-center justify-items-center m2-2">{{$bicicletas+$motos}}</button>
         
                <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTOS</button>
           
          
                <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ml-2">{{$bicicletas}}<br> BICICLETAS</button>
                
            

        </div>
    </div>
</div>

    <div class="px-6 py-2 mt-2">
        <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre del dueño" autocomplete="off">
    </div>
    @if($vehiculos->count())
        
        <div class="max-w-7xl lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-8">

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
