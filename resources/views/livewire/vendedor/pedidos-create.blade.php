<div>

    @if ($type=='ticket')
        
            @if (IS_NULL($eventoid))
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-4">
                    @foreach ($eventos as $evento)
                        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                        <div class="flex w-full items-center justify-between space-x-6 p-6">
                            <div class="flex-1 truncate">
                            <div class="flex items-center space-x-3">
                                <h3 class="truncate text-sm font-medium text-gray-900">{{$evento->titulo}}</h3>
                                <span class="inline-flex flex-shrink-0 items-center rounded-full bg-green-50 px-1.5 py-0.5 text-xs font-medium text-blue-600 ring-1 ring-inset ring-green-600/20">Creator</span>
                            </div>
                            <p class="mt-1 truncate text-sm text-gray-500">Acount owner</p>
                            </div>
                            <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300" src="{{Storage::url($evento->image->url)}}" alt="">
                        </div>
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="-ml-px flex w-0 flex-1 cursor-pointer">
                                    <span wire:click="set_eventoid({{$evento->id}})" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900 hover:bg-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                        
                                        Seleccionar
                                    </span>
                                </div>
                            </div>
                        </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-4">
                    <li>

                    </li>
                    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                        <div class="flex w-full items-center justify-between space-x-6 p-6">
                            <div class="flex-1 truncate">
                            <div class="flex items-center space-x-3">
                                <h3 class="truncate text-sm font-medium text-gray-900">{{$eventoselected->titulo}}</h3>
                                <span class="inline-flex flex-shrink-0 items-center rounded-full bg-green-50 px-1.5 py-0.5 text-xs font-medium text-blue-600 ring-1 ring-inset ring-green-600/20">Creator</span>
                            </div>
                            <p class="mt-1 truncate text-sm text-gray-500">Acount owner</p>
                            </div>
                            <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300" src="{{Storage::url($eventoselected->image->url)}}" alt="">
                        </div>
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="-ml-px flex w-0 flex-1 cursor-pointer">
                                    <span wire:click="set_eventoid({{$eventoselected->id}})" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900 bg-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                        
                                        Seleccionado
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li> 
                </ul>
            @endif
            
    @endif
    
    @if ($type=='pedido' || $eventoid)
        
            @if (is_null($selectedSocios) && is_null($invitados))
                <div class="bg-gray-100 border-t-4 mb-6 mx-3 border-gray-500 rounded-b text-gray-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                    <div>
                
                    <p class="text-base ">
                        Debe indicar si el pedido sera para un invitado o un rider registrado. En caso de ser este último, podrá acceder a la información ya registrada, de lo contrario, puede buscar si el invitado a comprado anteriormente o registrar al nuevo cliente como invitado.
                    </p>
                </div>
                    </div>
                </div>
            @endif
            <div class="flex justify-center">
                <div class="flex">
                    <textarea id="myTextarea" wire:model="textoPortapapeles" class="sm:hidden w-full shadow-sm border-2 border-gray-300 bg-white px-5 pr-16 rounded-lg focus:outline-none" required autofocus autocomplete="off"></textarea>
                    <button class="sm:hidden btn btn-success mx-2 my-2" onclick="pegarDesdePortapapeles()">Pegar</button>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="block">
                    @if ($textoPortapapeles)
                        <button wire:click="completarDesdePortapapeles">(Autocompletar)</button>
                    @endif
                
                </div>
            </div>
                
            <div class="px-6 py-4">
                <input wire:keydown="limpiar_page" wire:model="search"  class=" flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Buscar..." required autofocus autocomplete="off">
            </div>
            <div class="flex items-center justify-center mb-2" >
                @if(is_null($selectedSocios))   
                    <a class="btn btn-danger form-control cursor-pointer" wire:click="updateselectedInvitado">Nuevo</a>    
                @endif
                @if(is_null($invitados))
                    <a class="btn btn-success ml-2 form-control cursor-pointer" wire:click="updateselectedSocios">Rider Registrado</a>
                @endif
            </div>

            @if(!is_null($selectedSocios) || ($search && $socios->count()>0 && is_null($invitado_id)))
                @if(is_null($socio_id))
                
                    <x-table-responsive>
                    

                        @if ($socios->count())

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Riders Registrados
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Rut
                                    </th>
                                
                                    <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($socios as $socio)
                                    
                                            
                                            <tr wire:click="updatesocio_id({{$socio->id}})" >
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                                
                                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{ $socio->user->profile_photo_url }}" alt=""  />
                                                            
                                                                
                                                            
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm text-gray-900">
                                                                {{$socio->name}}
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{$socio->email}}</div>
                                                    
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{$socio->rut}}</div>
                                                    
                                                </td>

                                                
                                                

                                                
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a wire:click="updatesocio_id({{$socio->id}})" class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Seleccionar</a>
                                                
                                                </td>
                                            </tr>

                    
                                    @endforeach
                                    <!-- More people... -->
                                </tbody>
                            </table>
                            
                        @else
                            <div class="px-6 py-4">
                                No hay ningun registro
                            </div>
                        @endif 

                        <div class="px-6 py-4">
                            {{$socios->links()}}
                        </div>
                    </x-table-responsive>

                    <div class="hidden flex justify-end">
                        <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                        
                    </div>
                @else    

                    <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-teal-900 pl-4 py-3 shadow-md my-4 mx-auto items-center max-w-sm" role="alert">
                        
                        <div class="flex">
                            <div class="py-1">
                                @foreach ($selectedSocios as $socio)
                                    @if ($socio->id == $socio_id)

                                        <img class="h-11 w-11 object-cover object-center rounded-full mr-4" src="{{ $socio->user->profile_photo_url }}" alt=""  />
                                
                                    @endif

                                @endforeach
                            </div>
                            
                            <div>
                                
                                @foreach ($selectedSocios as $socio)
                                    @if ($socio->id == $socio_id)
                                        <p class="font-bold">{{$socio->user->name.", ".$socio->rut}}</p>
                                        @if ($socio->direccion)
                                            <p class="text-sm">{{$socio->direccion->comuna.", ".$socio->direccion->region}} </p>  
                                        @endif
                                    
                                    @endif

                                @endforeach
                            </div>

                            <span class="relative top-0 bottom-0 right-0 ml-8 py-3" wire:click="resetsocio">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cancelar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                        </div>
                    </div>

                    {!! Form::open(['route' => 'vendedor.pedidos.store', 'method'=> 'POST']) !!}
                        @csrf
                    {!! Form::hidden('user_id',auth()->user()->id) !!}

                    {!! Form::hidden('pedidoable_type','App\Models\Socio') !!}

                    {!! Form::hidden('pedidoable_id',$socio_id) !!}

                    <div class="bg-yellow-100 border-t-4 border-yellow-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-4 mx-auto items-center max-w-sm">

                            <div class="flex items-center mt-4">
                                <Label class="w-80">Despacho:</Label>
                                <select wire:model="selecteddespacho" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight  focus:bg-white focus:border-gray-500">
                                    <option value="">--Despacho--</option>

                                        <option value="1">Domicilio</option>
                                        <option value="2">Sucursal</option>
                                        <option value="3">Retiro en tienda</option>
                
                                </select>
                            </div>

                            <div>
                                @if(!is_null($transportistas))
                                    {!! Form::label('transportista_id', 'Transportista') !!}
                                    {!! Form::select('transportista_id', $transportistas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                @endif
                            </div>
                
                    </div>


                    <div class="flex justify-end">
                        <button type="button" class="font-semibold rounded-lg bg-red-600 hover:bg-red-500 text-white py-2 px-4 justify-center my-4 text-sm ml-2" wire:click="cancel" >Cancelar</button>
                        {!! Form::submit('Ingresar Pedido', ['class'=>'font-semibold rounded-lg bg-green-600 hover:bg-green-500 text-white py-2 px-4 justify-center my-4 cursor-pointer ml-2']) !!}
                    </div>

                {!! Form::close() !!}
                @endif 
            @endif

        @if(!is_null($invitados) || ($search && $guess->count() && is_null($socio_id)) || ($search && $socios->count()==0) || ($search && $guess->count()==0 && is_null($socio_id)))

            @if ($invitado_id)  

                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-teal-900 pl-4 py-3 shadow-md my-4 mx-auto items-center max-w-sm" role="alert">
                            
                    <div class="flex">
                        <div class="py-1">
                            @foreach ($guess as $invitado)
                                @if ($invitado->id == $invitado_id)

                                    <img class="h-11 w-11 object-cover object-center rounded-full mr-4" src="{{asset('img/compras.jpg')}}" alt=""  />
                            
                                @endif

                            @endforeach
                        </div>
                        
                        <div>
                            
                            @foreach ($guess as $invitado)
                                @if ($invitado->id == $invitado_id)
                                    <p class="font-bold">{{$invitado->name.", ".$invitado->rut}}</p>
                                    @if ($invitado->direccion)
                                        <p class="text-sm">{{$invitado->direccion->comuna.", ".$invitado->direccion->region}} </p>  
                                    @endif
                                @endif

                            @endforeach
                        </div>

                        <span class="relative top-0 bottom-0 right-0 ml-8 py-3" wire:click="resetsocio">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cancelar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                </div>

                {!! Form::open(['route' => 'vendedor.pedidos.store', 'method'=> 'POST']) !!}
                    @csrf
                {!! Form::hidden('user_id',auth()->user()->id) !!}

                {!! Form::hidden('pedidoable_type','App\Models\Invitado') !!}

                {!! Form::hidden('invitado_status','asociado') !!}

                {!! Form::hidden('pedidoable_id',$invitado_id) !!}

                <div class="bg-yellow-100 border-t-4 border-yellow-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-4 mx-auto items-center max-w-sm">

                        <div class="flex items-center mt-4">
                            <Label class="w-80">Despacho:</Label>
                            <select wire:model="selecteddespacho" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">--Despacho--</option>

                                    <option value="1">Domicilio</option>
                                    <option value="2">Sucursal</option>
                                    <option value="3">Retiro en tienda</option>
            
                            </select>
                        </div>

                        <div>
                            @if(!is_null($transportistas))
                                {!! Form::label('transportista_id', 'Transportista') !!}
                                {!! Form::select('transportista_id', $transportistas, null , ['class'=>'form-input block w-full mt-1']) !!}
                            @endif
                        </div>

                </div>


                <div class="flex justify-end">

                    {!! Form::submit('Ingresar Pedido', ['class'=>'font-semibold rounded-lg bg-green-600 hover:bg-green-500 text-white py-2 px-4 justify-center ml-2 my-2']) !!}
                </div>
                {!! Form::close() !!}
            @else
            <x-table-responsive>
            

                @if ($guess->count())

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Invitados
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rut
                            </th>
                        
                            <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($guess as $invitado)
            
                                    
                                    <tr wire:click="updateinvitado_id({{$invitado->id}})">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                        
                                                        <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt=""  />
                                                    
                                                        
                                                    
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm text-gray-900">
                                                        {{$invitado->name}}
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$invitado->email}}</div>
                                            
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$invitado->rut}}</div>
                                            
                                        </td>

                                        
                                        

                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a wire:click="updateinvitado_id({{$invitado->id}})" class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Seleccionar</a>
                                        
                                        </td>
                                    </tr>

                            
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                    
                @else
                    <div class="px-6 py-4">
                        No hay ningun registro
                    </div>
                @endif 

                <div class="px-6 py-4">
                    {{$guess->links()}}
                </div>
            </x-table-responsive>

                <h1 class="text-center my-4"> Crea un nuevo invitado a continuacion</h1>
                <div>
                    {!! Form::open(['route' => 'vendedor.pedidos.store', 'method'=> 'POST']) !!}
                    @csrf
                    {!! Form::hidden('user_id',auth()->user()->id) !!}
                    
                    {!! Form::hidden('pedidoable_type','App\Models\Invitado') !!}

                    {!! Form::hidden('invitado_status','creado') !!}

                    <div wire:ignore>
                        <div class="mb-4">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', $nombre, ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}

                            @error('name')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            {!! Form::label('rut', 'Rut') !!}
                            {!! Form::text('rut', $rut , ['class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}
                        
                            @error('rut')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            {!! Form::label('fono', 'Fono') !!}
                            {!! Form::text('fono', $telefono , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}
                        
                            @error('fono')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', $email , ['class' => 'form-input block w-full mt-1'.($errors->has('email')?' border-red-600':'')]) !!}
                        
                            @error('email')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                        
                        
                        
                    </div>

                            <div class="grid grid-cols-2 gap-4">
                            
                            
                                <div class="items-center mt-4">
                                    
                                    <select wire:model="selecteddespacho" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                        <option value="">--Despacho--</option>

                                            <option value="1">Domicilio</option>
                                            <option value="2">Sucursal</option>
                                            <option value="3">Retiro en tienda</option>
                    
                                    </select>
                                </div>

                                <div>
                                    @if(!is_null($transportistas))
                                        {!! Form::label('transportista_id', 'Transportista:') !!}
                                        {!! Form::select('transportista_id', $transportistas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                    @endif
                                </div>
                            
                                <div>
                                </div>
                    
                            </div>
                            <div class="flex justify-end">
                            
                                {!! Form::submit('Ingresar Pedido', ['class'=>'font-semibold rounded-lg bg-green-600 hover:bg-green-500 text-white py-2 px-4 justify-center ml-2']) !!}
                            </div>
                        {!! Form::close() !!}
                </div>
                
            @endif
        

                <div class="flex justify-end">
                    <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
            
                </div>

        
            
            
            
        @endif

    @endif
   
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            pegarDesdePortapapelesOnLoad();
        });

        function pegarDesdePortapapeles() {
            navigator.clipboard.readText()
                .then((text) => {
                    Livewire.emit('actualizarTextoPortapapeles', text);
                })
                .catch((error) => {
                    console.error('No se pudo pegar desde el portapapeles: ', error);
                });
        }

        function pegarDesdePortapapelesOnLoad() {
            navigator.clipboard.readText()
                .then((text) => {
                    Livewire.emit('actualizarTextoPortapapeles', text);
                })
                .catch((error) => {
                    console.error('No se pudo pegar desde el portapapeles: ', error);
                });
        }
    </script>

</div>