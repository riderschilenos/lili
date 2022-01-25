<div>
    
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
        
            
            {!! Form::open(['route'=>'garage.vehiculo.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                @csrf

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8 mt-6">

                    <div class="flex items-center mt-4">
                        <Label class="w-80">Marca:</Label>
                        <select wire:model="selectedmarca" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">--Marca--</option>
                                    
                            
                            @foreach ($marcas as $marca)
                                

                                <option value="{{$marca->id}}">{{$marca->name}}</option>
            
                                
                                
                            @endforeach

                        </select>
                    </div>
                    

                    <div class="mb-4">
                        
                        {!! Form::label('modelo', 'Modelo:*') !!}
                        {!! Form::text('modelo', null , ['class' => 'form-input block w-full mt-1'.($errors->has('modelo')?' border-red-600':'')]) !!}

                        @error('modelo')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {!! Form::label('cilindrada', 'Cilindrada:*') !!}
                        {!! Form::text('cilindrada', null , ['class' => 'form-input block w-full mt-1'.($errors->has('cilindrada')?' border-red-600':'')]) !!}

                        @error('cilindrada')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {!! Form::label('año', 'Año:*') !!}
                        {!! Form::text('año', null , ['class' => 'form-input block w-full mt-1'.($errors->has('año')?' border-red-600':'')]) !!}

                        @error('año')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {!! Form::label('nro_serie', 'Nro Chasis/Serie:*') !!}
                        {!! Form::text('nro_serie', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_serie')?' border-red-600':'')]) !!}

                        @error('nro_serie')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    
                </div>

                <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del vehiculo</h1>
                <div class="grid grid-cols-2 gap-4">
                    <figure>
                        @isset($vehiculo->image)
                            <img id="picture" class="w-full h-64 object-cover object-center"src="{{Storage::url($vehiculo->image->url)}}" alt="">
                        @else
                            <img id="picture" class="w-full h-64 object-cover object-center"src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
                            
                        
                        @endisset
                        </figure>
                    <div>
                        <p class="mb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, in magnam sunt ipsa blanditiis eaque libero sed aliquam vel perspiciatis, rem cum ratione alias dignissimos totam unde beatae quo nostrum.</p>
                        {!! Form::file('file', ['class'=>'form-input w-full'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                        @error('file')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>



                {!! Form::hidden('user_id',auth()->user()->id) !!}

                {!! Form::hidden('marca_id',$selectedmarca) !!}

                {!! Form::hidden('status', 2 ) !!}

                {!! Form::hidden('vehiculo_type_id',$selectedvehiculotype) !!}

                <div class="flex justify-end">
                    {!! Form::submit('Crear Vehiculo', ['class'=>'btn btn-primary cursor-pointer']) !!}
                </div>

            {!! Form::close() !!}

        

        @endif
    
    
 

</div>
