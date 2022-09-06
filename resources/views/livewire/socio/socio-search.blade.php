<div>

        {{-- 
        
        <div class="bg-gray-200 py-4 mb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
                
                <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                    <i class="fas fa-archway text-xs mr-2"></i>
                    Todos los videos
                </button>
            
                   
                    <!-- Dropdown Disciplina -->
                    <div class="relative" x-data="{ open: false}" >
                        <div>
                            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" x-on:click="open = true">
                                <i class="fas fa-biking text-sm mr-2"></i>
                                Disciplina
                                <i class="fas fa-angle-down text-sm ml-2"></i>
                            </button>
                        </div>
                    
                        <!--
                        Dropdown menu, show/hide based on menu state.
                    
                        Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                        Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-show="open" x-on:click.away="open = false">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            @foreach ($disciplinas as $disciplina)
                                <a class="cursor-pointer text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white" wire:click="$set('disciplina_id',{{$disciplina->id}})" x-on:click="open = false">
                                    {{$disciplina->name}}
                                </a>
                            @endforeach
                            
                            
                        </div>
                        </div>
                    </div>
    

            </div>
        </div>  
            --}}
        <div class="px-6 py-4">
            <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre de un rider" autocomplete="off">
        </div>

        @if ($socios->count())

            {{--  
            
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
                    
                            <tr>
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
            </table>--}}
            <section class="my-4 py-12">
               
                <div class="max-w-7xl mx-auto px-4 sm:px-2 lg:px-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 gap-x-2 gap-y-8">

                    @foreach ($socios as $socio)

                        

                            <x-socio-card :socio="$socio" />

                        
        
                    @endforeach
        
                </div>
            
            </section>
            
            
        @else
            <div class="px-6 py-4">
                No hay ningun registro
            </div>
        @endif 

        <div class="px-6 py-4">
            {{$socios->links()}}
        </div>




</div>
