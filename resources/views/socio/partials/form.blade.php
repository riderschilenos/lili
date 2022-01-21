

                    <div class="mb-4">
                        {!! Form::label('nombre', 'Nombre') !!}
                        {!! Form::text('nombre', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                        @error('nombre')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {!! Form::label('rut', 'Rut') !!}
                        {!! Form::text('rut', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                        @error('nombre')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {!! Form::label('nro', 'Nro') !!}
                        {!! Form::text('nro', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                        @error('nro')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        
                        <div class="grid grid-cols-2 gap-6">
                           <div>
                                    {!! Form::label('username', 'Username') !!}
                                    {!! Form::text('username', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}
                                    @error('username')
                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                    @enderror
                            </div>
                                <div>
                                    <div class="mb-4">
                                        {!! Form::label('slug', 'Slug (Optimizado)') !!}
                                        {!! Form::text('slug', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1']) !!}
                                    </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    

                    <div class="mb-4">
                        {!! Form::label('subtitulo', 'Subtitulo de la serie') !!}
                        {!! Form::text('subtitulo', null , ['class' => 'form-input block w-full mt-1'.($errors->has('subtitulo')?' border-red-600':'')]) !!}

                        @error('subtitulo')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {!! Form::label('descripcion', 'Descripción') !!}
                        {!! Form::textarea('descripcion', null , ['class' => 'form-input block w-full mt-1']) !!}
                        
                        @error('descripcion')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    

                    <h1 class="text-2xl font-bold mt-8 mb-2">Imagen de la serie</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <figure>
                            @isset($serie->image)
                                <img id="picture" class="w-full h-64 object-cover object-center"src="{{Storage::url($serie->image->url)}}" alt="">
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