    <div class="mb-4">
                                
        {!! Form::label('modelo', 'Modelo:*') !!}
        {!! Form::text('modelo', null , ['class' => 'form-input block w-full mt-1'.($errors->has('modelo')?' border-red-600':'')]) !!}

        @error('modelo')
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

    <div class="mb-4 col-pan-1 md:col-span-2" wire:ignore>
        {!! Form::label('descripcion', 'Descripción') !!}
        {!! Form::textarea('descripcion', null , ['class' => 'form-input block w-full mt-1']) !!}
        
        @error('descripcion')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>

    </div>



    {!! Form::hidden('user_id',auth()->user()->id) !!}

    {!! Form::hidden('marca_id',$selectedmarca) !!}

    {!! Form::hidden('status', 1 ) !!}

    {!! Form::hidden('vehiculo_type_id',$selectedvehiculotype) !!}

    <div class="flex justify-end">
    {!! Form::submit('Siguiente Paso (Precio y comisión)', ['class'=>'btn btn-primary cursor-pointer']) !!}
    </div>
