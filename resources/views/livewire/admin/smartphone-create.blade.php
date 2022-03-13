<div>
    <div class="card">
        <div class="card-body">
            
               
                
                <div class="form-group">
                    <Label class="w-80 mt-4">Marca:</Label>
                        <div class="items-center ">
                            
                            <select wire:model="selectedmarca" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">Selecciona una opción</option>
                                @foreach ($marcas as $marca)
                    
                                    <option value="{{$marca->id}}">{{$marca->name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>


        

                    
                

                   

                {!! Form::open(['route'=>'admin.smartphone.store', 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                        @csrf


                    {!! Form::hidden('marcasmartphone_id',$selectedmarca) !!}
                  
                 

                    <div class="mb-4 mt-2">
                        {!! Form::label('modelo','Modelo') !!}
                        {!! Form::text('modelo',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del modelo']) !!}
                    </div>

                  
                    @error('modelo')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

                    <div class="mb-4">
                        {!! Form::label('stock', 'Stock:') !!}
                        {!! Form::number('stock', null , ['class'=>'form-control', 'placeholder'=>'Ingrese el stock actual']) !!}
                    
                        @error('stock')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                </div>
                {!! Form::submit('Crear Smartphone', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
