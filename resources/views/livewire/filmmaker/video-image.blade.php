<div class="" x-data="{key: false}">
    <div class=" bg-gray-100">

            
            <div class="flex">
                <p class="text-sm">Imagen del Video: <h5 class="text-red-600 font-bold text-sm cursor-pointer" x-on:click="key=!key" x-show="key">(Cancelar)</h5></p>
            </div> 
            <div class="flex" x-show="!key" >
                <p class="text-sm">{{$video->image->url}} <h5 class="text-blue-600 font-bold text-sm cursor-pointer" x-on:click="key=!key">(Editar)</h5></p>
            </div>

        
                <div x-show="key">
                    <form wire:submit.prevent="update">
                        <div class="flex items-center" >
                            <input wire:model="file" type="file" class="form-input flex-1 bg-gray-200"> 
                            <button type="submit" class="btn btn-primary text-sm ml-2" >Guardar</button>
                    
                        </div>

                        <div class="text-red-500  text-sm font-bold mt-1" wire:loading wire:target="file ">
                            CARGANDO ...
                        </div>

                        @error('file')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                </div>
            
            
    </div>
</div>
