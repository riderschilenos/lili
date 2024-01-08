<div class="md:flex-1 px-4">
    <div x-data="{ image: 1 }" x-cloak>
      <div class="h-80 md:h-92 rounded-lg bg-gray-100 mb-4">
        @php
            $nf=1;
        @endphp
        @foreach ($producto->images as $image)
          @if ($nf==1)
            <div x-show="image === {{$nf}}" class="h-80 md:h-92   rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                  
                <div class="flex justify-center">
                  @if ($producto->image)
                    <img src="{{Storage::url($image->url)}}" class="h-80 md:h-92  " alt="">
                    
                    
                      <span class="flex cursor-pointer" wire:click="imagedestroy({{$image}})">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cancelar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        Eliminar
                      </span>
                  
                  
                  @else
                    <img src="https://broxtechnology.com/images/iconos/box.png" class="h-80 md:h-92  " alt="">
                  @endif
                    
                  </div>
            </div>
          @else
            <div x-show="image === {{$nf}}" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
              
              <div class="flex justify-center">
                @if ($producto->image)
                  <img src="{{Storage::url($image->url)}}" class="h-64 md:h-80  " alt="">
                  <span class="flex cursor-pointer" wire:click="imagedestroy({{$image}})">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cancelar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    Eliminar
                  </span>
                @else
                  <img src="https://broxtechnology.com/images/iconos/box.png" class="h-64 md:h-80  " alt="">
                @endif
                  
                </div>
            </div>
              
          @endif
            @php
                $nf+=1;
            @endphp
        @endforeach
      
      </div>

      <div class="grid grid-cols-4 mx-2 mb-4">
          @php
              $nf2=1;
          @endphp
          @foreach ($producto->images as $item)
            <div class="flex-1 px-2">
              <button x-on:click="image = {{$nf2}}" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === {{$nf2}} }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                  <div class="flex justify-center p-3">
                      <img src="{{Storage::url($item->url)}}" class="p-2 object-contain" alt="">
                  </div>
              </button>
            </div>
            @php
                $nf2+=1;
            @endphp
          @endforeach
        

      </div>
    </div>
  </div>
