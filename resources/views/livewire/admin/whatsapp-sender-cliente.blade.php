<div>
    <div class="block bg-gray-800 p-3 mt-4 rounded-lg">
                                
        <div class="mb-4">
            
            <h1 class="text-center font-bold  mb-2 text-white">Nro de Whatsapp:</h1>
            <input wire:model="nro" class="form-input border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
        </div>
     

        <div class="grid grid-cols-3 gap-y-2 justify-center mb-4">                 
            <button class="btn btn-success mx-2" wire:click="invitacion">Invitación Registro</button>
            <button class="btn btn-success mx-2" wire:click="carcasas">Catálogo Carcasas</button>
            <button class="btn btn-success mx-2" wire:click="accesorios">Catálogo Accesorios</button>
            <button class="btn btn-success mx-2" wire:click="polerones">Catálogo Polerones</button>
        </div>
    <div class="bg-white">
        <x-table-responsive>
            <div class="px-6 py-4 flex">
                <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-2xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($guess_all->count())}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Invitados</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Invitados</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                 <input wire:keydown="limpiar_page" wire:model="search"  class="form-input my-auto items-center mx-4 flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre, rut, fono o email del invitado para saber si a comprado antes">
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-2xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($socios_all->count())}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Socios</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Socios</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
            </div>
    
            @if ($guess->count())
    
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fono
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
                                                <div class="text-sm text-gray-900">{{$invitado->rut}}</div>
                                                <span class="whitespace-nowrap mt-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Invitado
                                                </span>
                                            </div>
                                        </div>
                                    </td>
    
                                   
    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$invitado->fono}}</div>
                                        
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
        <x-table-responsive>
           

            @if ($socios->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
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
                                                <div class="text-sm text-gray-900">{{$socio->rut}}</div>
                                                <span class="whitespace-nowrap mt-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Socio
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                   

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$socio->fono}}</div>
                                        
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
    </div>
    </div> 
</div>
