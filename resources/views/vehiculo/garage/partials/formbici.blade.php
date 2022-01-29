
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
                    <div class="mb-4">
                        {!! Form::label('nro_serie', 'Nro Chasis/Serie:*') !!}
                        {!! Form::text('nro_serie', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_serie')?' border-red-600':'')]) !!}

                        @error('nro_serie')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {!! Form::label('aro_front', 'Aro:') !!}
                        {!! Form::text('aro_front', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_serie')?' border-red-600':'')]) !!}

                        @error('aro_front')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                   
                    
                </div>




                {!! Form::hidden('user_id',auth()->user()->id) !!}

                {!! Form::hidden('marca_id',$selectedmarca) !!}

                {!! Form::hidden('socio_id',$socio->id) !!}

                {!! Form::hidden('status', 2 ) !!}

                {!! Form::hidden('vehiculo_type_id',$selectedvehiculotype) !!}

        

                <div class="flex justify-center">
                    {!! Form::submit('Siguiente', ['class'=>'btn btn-primary cursor-pointer']) !!}
                </div>
                