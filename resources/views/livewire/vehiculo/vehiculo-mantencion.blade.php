<section class="mt-4" x-data="{open: false}">
    <div class="flex">
    <h1 class="font-bold text-2xl mb-2 text-gray-800">Mantenciones</h1>
    @can('vehiculo_propio', $vehiculo)
        <button class="btn btn-danger ml-auto mr-2 mb-2" x-show="!open" x-on:click="open=true">Ingresar Mantención</button> 
    @endcan
    </div>
{{-- comment@else --}}

    
    <article class="my-4 card card-body" x-show="open">
        
        
        {!! Form::open(['route'=>'garage.mantencion.store', 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
        @csrf

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-8 mt-6">
            <div class="">
                    
                {!! Form::label('titulo', 'Titulo:*') !!}
                {!! Form::text('titulo', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}
        
                @error('titulo')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
            </div>

            <div class="">
                    
                {!! Form::label('servicio', 'Servicio:*') !!}
                {!! Form::textarea('servicio', null , ['class' => 'form-input block w-full mt-1'.($errors->has('servicio')?' border-red-600':'')]) !!}
        
                @error('servicio')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
            </div>

            <div class="">
                    
                
                <div>
                    {!! Form::label('foto', 'Foto:*') !!}
                    {!! Form::file('foto', ['class'=>'form-input w-full'.($errors->has('foto')?' border-red-600':''), 'id'=>'foto','accept'=>'image/*']) !!}
                    
                </div>

                <div>
                    {!! Form::label('repuestos', 'Repuestos:') !!}
                    {!! Form::file('repuestos', ['class'=>'form-input w-full'.($errors->has('repuestos')?' border-red-600':''), 'id'=>'repuestos','accept'=>'image/*']) !!}
                    
                </div>

                <div>
                    {!! Form::label('comprobante', 'Comprobante:') !!}
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
                    <figure class="mr-4 mt-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$vehiculo->user->profile_photo_url}}" alt="">
                    </figure>

                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{$mantencion->titulo}}</b> <i class="fas fa-tools text-grey-800"></i> Fernando Reyes</p>
                            {!!$mantencion->servicio!!}
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
