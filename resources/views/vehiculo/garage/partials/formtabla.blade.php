

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
                   
                   
                    
                </div>





        

                
                