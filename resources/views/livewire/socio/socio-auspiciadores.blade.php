<div>
    <div class="grid grid-cols-3">
        @if ($user->Auspiciadors->count())
        
            @foreach ($user->Auspiciadors as $auspiciador)
                <div class="text-center my-2" >          
                        <img class="h-16 w-20 mx-auto object-contain"
                        src="{{Storage::url($auspiciador->logo)}}"
                        alt="" wire:click="show({{$auspiciador}})">
                </div>
                
            @endforeach
        @else
            <ul class="@can('perfil_propio', $socio)col-span-2 @else col-span-3 @endcan bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                <li class="items-center py-3 mx-auto">
                    @can('perfil_propio', $socio)
                        <h1 class="text-center text-xs">Agrega tu primer auspiciador</h1>
                    @else
                        <h1 class="text-center text-xs">{{$user->name}} no cuenta con auspiciadores</h1>
                    @endcan
                                               
                </li>
            
            </ul>
        @endif
        @can('perfil_propio', $socio)
            @if (!$formulario)
                <div class="flex justify-center items-center" wire:click="formulario">
                    <img class="h-8 w-12 mx-auto object-contain"
                    src="{{asset('img/socio/addnew.png')}}"
                    alt="">
                </div>
            @endif
        @endcan
    </div>

    @if ($current)
        <div wire:click="show({{$current}})">
            <div class="col-span-3 bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow px-3 mt-3 divide-y rounded shadow-sm">
                <div class="grid grid-cols-3">
                    <div>
                        <div class="text-center my-2" >          
                            <img class="h-16 w-20 mx-auto object-contain"
                            src="{{Storage::url($current->logo)}}"
                            alt="">
                        </div>
                    </div>
                    <div class="col-span-2 items-center my-auto mx-auto border-2 py-3 px-5">
                        <h1 class="text-center text-xl font-bold">{{$current->name}}</h1>
                                
                    </div>
                </div>
                <h1 class="text-center py-3">{{$current->beneficio}}</h1>
                <h1 class="text-right text-xs py-1 cursor-pointer" wire:click="destroy({{$current}})">Eliminar</h1>  
            </div>
        </div>
    @endif
        

    @if ($formulario)
        <article class="my-4 text-center">
        
        
            {!! Form::open(['route'=>'socio.auspiciadors.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
            @csrf
    
            <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-2 mt-6">
                <div class="">
                        
                    {!! Form::label('name', 'Nombre del Auspiciador:*') !!}
                    {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
            
                    @error('name')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="">
                        
                    
                    <div class="grid grid-cols-1">
                        <h1 class="py-2">Logo*</h1>
                        {!! Form::file('logo', ['class'=>'form-input w-full'.($errors->has('logo')?' border-red-600':''), 'id'=>'logo','accept'=>'image/*']) !!}
                        
                    </div>
                    <hr class="w-full mt-2 mb-4">
    
    
                    @error('logo')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div>
                        
                    {!! Form::label('beneficio', '¿En que te apoya tu auspiciador?') !!}
                    {!! Form::textarea('beneficio', null , ['class' => 'form-input block w-full mt-1'.($errors->has('beneficio')?' border-red-600':''),'placeholder'=>'Describe brevemente como es tu relacion y el apoyo que te brinda especificamente esta marca o persona...']) !!}
            
                    @error('beneficio')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
    
                
          
                    {!! Form::hidden('user_id',$user->id) !!}
    
                <div class="flex justify-center">
                    <a class="btn btn-danger mr-2 ml-auto" wire:click="formulario">Cancelar</a> 
                    {!! Form::submit('Guardar', ['class'=>'btn btn-primary cursor-pointer']) !!}
                    {!! Form::close() !!}
                </div>
    
            
                                                       
            
        </article>
    @endif 
</div>
