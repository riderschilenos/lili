
                    <div class="mb-4">
                        {!! Form::label('titulo', 'Nombre del evento') !!}
                        {!! Form::text('titulo', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                        @error('titulo')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4 hidden">
                        {!! Form::label('slug', 'Slug del evento') !!}
                        {!! Form::text('slug', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1']) !!}
                    </div>

                    <div class="mb-4">
                        {!! Form::label('subtitulo', 'Slogan del evento') !!}
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
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            {!! Form::label('disciplina_id', 'Disciplina') !!}
                            {!! Form::select('disciplina_id', $disciplinas, null , ['class'=>'form-input block w-full mt-1']) !!}
                        </div>
                        <div>
                            {!! Form::label('precio_id', 'Entrada adultos') !!}
                            {!! Form::number('entrada', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_serie')?' border-red-600':''),'step' => '0.5','placeholder'=>'$']) !!}
                        </div>
                        <div>
                            {!! Form::label('precio_id', 'Entrada niños') !!}
                            {!! Form::number('entrada_niño', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_serie')?' border-red-600':''),'step' => '0.5','placeholder'=>'$']) !!}                   
                        </div>

                    </div>

                    <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del evento</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <figure>
                            @isset($evento->image)
                                <img id="picture" class="w-full h-64 object-cover object-center"src="{{Storage::url($evento->image->url)}}" alt="">
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