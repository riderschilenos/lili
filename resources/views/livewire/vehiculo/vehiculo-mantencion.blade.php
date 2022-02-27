<section class="mt-4" x-data="{open: false}">
    @php
        $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    @endphp
    <div class="flex">
    <h1 class="font-bold text-2xl mb-2 text-gray-800">Mantenciones</h1>
    @can('vehiculo_propio', $vehiculo)
        <button class="btn btn-danger ml-auto mr-2 mb-2" x-show="!open" x-on:click="open=true">Ingresar Mantención</button> 
    @endcan
    </div>
{{-- comment@else --}}

    
    <article class="my-4 card card-body" x-show="open">
        
        
        {!! Form::open(['route'=>'garage.mantencion.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
        @csrf

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-8 mt-6">
            <div class="">
                    
                {!! Form::label('titulo', 'Título de la mantención:*') !!}
                {!! Form::text('titulo', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}
        
                @error('titulo')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
            </div>

            <div class="">
                    
                {!! Form::label('servicio', 'Descripción o productos utilizados:*') !!}
                {!! Form::textarea('servicio', null , ['class' => 'form-input block w-full mt-1'.($errors->has('servicio')?' border-red-600':''),'placeholder'=>'¿Que productos usaste? Detalla el proceso...']) !!}
        
                @error('servicio')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
            </div>

            <div class="">
                    
                
                <div>
                    <h1>Foto General*:</h1>
                    {!! Form::file('foto', ['class'=>'form-input w-full'.($errors->has('foto')?' border-red-600':''), 'id'=>'foto','accept'=>'image/*']) !!}
                    
                </div>

                <div>
                    <h1>Foto Repuestos utilizados:</h1>
                    {!! Form::file('repuestos', ['class'=>'form-input w-full'.($errors->has('repuestos')?' border-red-600':''), 'id'=>'repuestos','accept'=>'image/*']) !!}
                    
                </div>

                <div>
                    <h1>Foto Boleta o Comprobante:</h1>
                    {!! Form::file('comprobante', ['class'=>'form-input w-full'.($errors->has('comprobante')?' border-red-600':''), 'id'=>'comprobante','accept'=>'image/*']) !!}
                    
                </div>


                @error('foto')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
            </div>
      
                {!! Form::hidden('vehiculo_id',$vehiculo->id) !!}

            <div>
              {!! Form::submit('Guardar', ['class'=>'btn btn-primary cursor-pointer']) !!}

              {!! Form::close() !!}
              <a class="btn btn-danger mr-2 mb-2 ml-auto" x-on:click="open=false">Cancelar</a> 
            </div>

        
                                                   
        
    </article>
        
    {{-- comment 
    @endcan--}}
    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>Información actualizada al dia {{date('d-m-Y', strtotime($now))}}</p>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($vehiculo->mantencions->count()==1)
                <p class="text-grey-800 text-xl">1 Mantención</p>
            @else
                <p class="text-grey-800 text-xl">{{$vehiculo->mantencions->count()}} Mantenciones</p>
            @endif
            

            @foreach ($vehiculo->mantencions->reverse() as $mantencion)
                <article class="flex mb-4 text-gray-800">
                    <figure class="mr-4 mt-4 ">
                        <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($mantencion->created_at))-1]}}</div>
                        <div class="text-sm text-gray-900">{{$mantencion->created_at->format('d-m-Y')}}</div>    
                    </figure>

                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <div class="grid grid-cols-2">
                                
                                <div>
                                    <p><b>{{$mantencion->titulo}}</b> <i class="fas fa-tools text-grey-800"></i></p>
                                    {!!$mantencion->servicio!!}
                                </div>
                                <div>
                                    
                                    <div class="mx-auto px-4 sm:px-6 lg:px-4 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3">

                                        <img class="h-50 w-72 object-contain object-center" src="{{Storage::url($mantencion->foto)}}" alt="">
                                        <img class="h-50 w-72 object-contain object-center" src="{{Storage::url($mantencion->repuestos)}}" alt="">
                                        <img class="h-50 w-72 object-contain object-center" src="{{Storage::url($mantencion->comprobante)}}" alt="">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
                
            @endforeach

        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/mantencion/form.js')}}"></script>
    </x-slot>
</section>
