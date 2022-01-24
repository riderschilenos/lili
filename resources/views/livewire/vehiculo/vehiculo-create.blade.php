<div>
    {!! Form::open(['route'=>'filmmaker.series.store','files'=>true , 'autocomplete'=>'off']) !!}

        <div class="flex justify-center mt-4">



            <div class="flex items-center mt-4">
                <Label class="w-80">Tipo de Vehiculo:</Label>
                <select wire:model="selectedvehiculotype" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Selecciona una opción</option>
                    @foreach ($vehiculo_types as $vehiculo_type)

                        <option value="{{$vehiculo_type->id}}">{{$vehiculo_type->name}}</option>
                        
                    @endforeach
                </select>
            </div>

        </div>
        
            @if(!is_null($marcas))
            
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8 mt-6">


                <div class="flex items-center mt-4">
                    <Label class="w-80">Marca:</Label>
                    <select class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">--Marca--</option>
                                
                        
                        @foreach ($marcas as $marca)
                            

                            <option value="{{$marca->id}}">{{$marca->name}}</option>
        
                            
                            
                        @endforeach

                    </select>
                </div>
                
                <div class="flex items-center mt-4">
                    <label class="w-32">MODELO:</label>
                    <input wire:model="name" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                </div>

                <div class="flex items-center mt-4">
                    <label class="w-32">Año:</label>
                    <input wire:model="name" class="form-date w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                </div>

                <div class="flex items-center mt-4">
                    <label class="w-32">Cilindrada:</label>
                    <input wire:model="name" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                </div>
                
            </div>

            @endif
        
        
        
</div>
