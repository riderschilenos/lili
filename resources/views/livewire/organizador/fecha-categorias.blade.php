<div>
    <div x-data="{open: false, categoria:false}">

        

            <div>


                    <div class="bg-gray-100 p-6 mt-6" x-data="{open: true}">
                        <div class="grid grid-cols-2">
                            <div>
                                <header class="flex justify-between item-center" >
                                    <h1 class="cursor-pointer"><strong>Fecha:</strong> {{$fecha->name}}</h1>
                                
                                </header>
                                
                                <div x-show="open">
                                    <h1 class="font-bold mt-4"><strong>Lugar:</strong> {{$fecha->lugar}}</h1>
                                    <h1 class="font-bold mt-4"><strong>Fecha:</strong> {{$fecha->fecha}}</h1>

                                </div>
                            </div>
                            <div>
                                    <div class="flex" x-on:click="categoria=!categoria">
                                        <div class="max-w-lg mx-auto">
                                            <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286M30 14a6 6 0 11-12 0 6 6 0 0112 0zm12 6a4 4 0 11-8 0 4 4 0 018 0zm-28 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            <h2 class="mt-2 text-lg font-medium text-gray-900">Agrega Una Categoria</h2>
                                            <p class="mt-1 text-sm text-gray-500">Si necesitas incluir una categoria que no esta en las opciones que te ofrecemos puedes ingresarla a continuación.</p>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="flex">
                                        <div class="max-w-2xl mx-auto">
                                        <div class="text-center mt-2">
                                            {!! Form::open(['route'=>'organizador.categorias.store','files'=>true , 'autocomplete'=>'off']) !!}
                                            <div x-show="categoria" class="flex">
                                                    
                                                    {!! Form::hidden('disciplina_id',$evento->disciplina_id) !!}
                        
                                                    <div>
                                                        {!! Form::text('name', null , ['class' => 'form-input w-full'.($errors->has('name')?' border-red-600':'')]) !!}
                                                    </div>
                                                    <div>
                                                            {!! Form::submit('Agregar', ['class'=>'ml-2 btn btn-primary']) !!}
                                                    </div>
                        
                                            </div>
                                            {!! Form::close() !!}
                                            <div class="flex justify-center" x-show="!categoria">
                                            <button type="submit" class="btn bg-blue-800 text-white justify-center mt-2 mr-4" x-on:click="categoria=!categoria">Agregar Categoria</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>       
                        

                            </div>
                        </div>

                        <h1 class="font-bold mt-12">INGRESA LAS CATEGORIAS</h1>
                        <p class="mb-4">Pincha las categorias que deseas incluir en tu eventos</p>
                      

                        
                    <x-table-responsive>
                        

                        @if ($categorias->count())
                        
                            <table class="min-w-full divide-y divide-gray-200 mt-4">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Agregar 
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Categoria             
                                    </th>
                                    {{-- comment
                                    
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Productos
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                    </th> --}}
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($categorias as $categoria)

                                    

                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex h-10 w-10">
                                                            
                                                                    <label>
                                                                        <input type="checkbox" wire:model="selected" value="{{$categoria->id}}" class="ml-4 mt-2">
                                                                    </label>
                                                            
                                                                
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </td>

                                        

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex h-10 w-10">
                                                            
                                                        
                                                                
                                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/rider.jpg')}}" alt="">
                                                            
                                                                <div class="text-sm text-gray-900 ml-3">{{$categoria->name}}</div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </td>
                                                
                                                {{-- comment
                                                
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 ml-3">{{$pedido->Ordens->count()}}<i class="fas fa-shopping-cart text-gray-400"></i></div>
                                                    <div class="text-sm text-gray-500">Productos</div>
                                                </td>

                                                

                                                

                                                <td class="px-6 py-4 whitespace-nowrap">    

                                                    @switch($pedido->status)
                                                        @case(1)
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                Borrador
                                                            </span>
                                                            @break
                                                        @case(2)
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                Pendiente de Pago
                                                            </span>
                                                            @break
                                                        @case(3)
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                            Procesando Pago
                                                            </span>
                                                            @break
                                                        @case(4)
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Despachado
                                                            </span>
                                                            @break
                                                        @default
                                                            
                                                        @endswitch
                                                        
                                                </td>
                                                
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pedido->created_at))-1]}}</div>
                                                    <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{route('vendedor.pedidos.edit',$pedido)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                                    
                                                </td> --}}
                                            </tr>
                                            
                                    @endforeach
                                <!-- More people... -->
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-4">
                                No hay pedidos pendientes de pago
                            </div>
                        @endif 
                        
                    </x-table-responsive>



                    <div class="bg-blue-900 rounded-lg max-w-sm mx-auto my-12">
                        <h1 class="text-center font-bold text-white pt-6">Agregar Categorias:</h1>
                        <div class="flex justify-center mt-2 mb-4 ">
                            
                        <form action="" method="POST">
                            @csrf
                            
                            <div class="mb-4">
                                
                                <h1 class="text-center font-bold text-white mt-6">Precio Inscripción:</h1>
                                {!! Form::number('nro', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro')?' border-red-600':'')]) !!}
        
                                @error('nro')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
        
                            <div class="flex justify-center">
                                <button class="btn btn-primary my-4" type="submit">Agregar</button>
                            </div>
                        </form>   
                      </div>
                    </div>

                    </div>                      

                        


                                    

                                        
            </div>
                                    
                         
           
                                

        
        <ul role="list" class="hidden mt-6 border-t border-b border-gray-200 py-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
          <li class="flow-root">
            <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
              <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-gray-500">
                <!-- Heroicon name: outline/view-list -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-900">
                  <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    Create a List<span aria-hidden="true"> &rarr;</span>
                  </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">Another to-do system you’ll try but eventually give up on.</p>
              </div>
            </div>
          </li>
      
          <li class="flow-root">
            <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
              <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-yellow-500">
                <!-- Heroicon name: outline/calendar -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-900">
                  <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    Create a Calendar<span aria-hidden="true"> &rarr;</span>
                  </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">Stay on top of your deadlines, or don’t — it’s up to you.</p>
              </div>
            </div>
          </li>
      
          <li class="flow-root">
            <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
              <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-green-500">
                <!-- Heroicon name: outline/photograph -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-900">
                  <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    Create a Gallery<span aria-hidden="true"> &rarr;</span>
                  </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">Great for mood boards and inspiration.</p>
              </div>
            </div>
          </li>
      
          <li class="flow-root">
            <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
              <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-blue-500">
                <!-- Heroicon name: outline/view-boards -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-900">
                  <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    Create a Board<span aria-hidden="true"> &rarr;</span>
                  </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">Track tasks in different stages of your project.</p>
              </div>
            </div>
          </li>
      
          <li class="flow-root">
            <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
              <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-indigo-500">
                <!-- Heroicon name: outline/table -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-900">
                  <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    Create a Spreadsheet<span aria-hidden="true"> &rarr;</span>
                  </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">Lots of numbers and things — good for nerds.</p>
              </div>
            </div>
          </li>
      
          <li class="flow-root">
            <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
              <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-purple-500">
                <!-- Heroicon name: outline/clock -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-900">
                  <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    Create a Timeline<span aria-hidden="true"> &rarr;</span>
                  </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">Get a birds-eye-view of your procrastination.</p>
              </div>
            </div>
          </li>
        </ul>
        <div class="hidden mt-4 flex">
          <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Or start from an empty project<span aria-hidden="true"> &rarr;</span></a>
        </div>

    </div>

    
    <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
  

</div>