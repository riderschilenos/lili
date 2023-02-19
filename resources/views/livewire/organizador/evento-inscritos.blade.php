<div>

    

    <x-table-responsive>
        <div class="px-6 py-4">
            <input wire:model="search" class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre de un usuario">
        </div>

        @if ($sponsors->count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Rut
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ticket Nro:
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Categoria / Nro
                    </th>
                  
                   
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($sponsors as $sponsor)
                    
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                    
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{$sponsor->profile_photo_url}}" alt="">
                                            
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$sponsor->name}}<br>
                                                {{$sponsor->email}}<br>
                                                {{$sponsor->socio->fono}}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 text">{{$sponsor->socio->rut}}</div>
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900 text-center">
                                        @foreach ($sponsor->tickets as $ticket)
                                            @if ($ticket->evento->id==$evento->id)
                                                @if ($ticket->status==2)
                                                    <a href="" class="btn btn-success h-10 my-auto">{{$ticket->id}}</a>
                                                @else
                                                    <a href="" class="btn btn-danger h-10 my-auto">{{$ticket->id}}</a>
                                                @endif
                                               
                                               
                                                
                                            @endif
                                            
                                        @endforeach
                                        
                                    
                                    </div>
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900 text-center">
                                       
                                                    
                                                    @foreach ($ticket->inscripcions as $inscripcion)
                                                                    
                                                                          <div class="flex">
                                                                             
                                                                                    <div class="px-6 py-4 whitespace-nowrap">
                                                                                
                                                                                    {{-- comment   {{$fecha->name}} --}} {{$inscripcion->fecha_categoria->categoria->name}}
                                                                                    
                                                                                    </div>
                                                                        
                                                                            
                                                
                                                                                    <div class="px-6 py-4 whitespace-nowrap">
                                                                                        <div class="items-center">
                                                                                            <p class="mx-4 text-center">{{$inscripcion->nro}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                            </div> 
                                                                                
                                            
                                
    
                                                    @endforeach
                                            
                                        
                                    
                                    </div>
                                    
                                </td>

                                
                                

                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                  
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
            {{$sponsors->links()}}
        </div>
    </x-table-responsive>


</div>