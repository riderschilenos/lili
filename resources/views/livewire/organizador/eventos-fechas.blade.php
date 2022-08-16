<div>
    <div x-data="{open: false, categoria:false}">

        @if ($evento->type!='carrera')

            <h1 x-show="!open" class="text-center mb-4">Preciona el boton para iniciar el formulario de una nueva fecha</h1>
            <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer justify-center">
                <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                Agregar Fecha
            </a>
        @endif
          
        <div x-show="open">
            <h2 class="text-lg font-medium text-gray-900 text-center">¿Cuando es la fecha?</h2>

            {!! Form::open(['route'=>'organizador.fechas.store','files'=>true , 'autocomplete'=>'off']) !!}
                    
                    {!! Form::hidden('evento_id',$evento->id) !!}

                    {!! Form::date('fecha', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fecha')?' border-red-600':''),'autocomplete'=>"off"]) !!}     
                    
                    <div class="my-4">
                      {!! Form::label('name', 'Nombre de la Fecha') !!}
                      {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}

                      @error('name')
                          <strong class="text-xs text-red-600">{{$message}}</strong>
                      @enderror
                    </div>

                    <div class="my-4">
                      {!! Form::label('lugar', 'Lugar') !!}
                      {!! Form::text('lugar', null , ['class' => 'form-input block w-full mt-1'.($errors->has('lugar')?' border-red-600':'')]) !!}

                      @error('lugar')
                          <strong class="text-xs text-red-600">{{$message}}</strong>
                      @enderror
                    </div>

                    <div class="my-4">
                      {!! Form::label('inscripcion', 'Valor Inscripcion:') !!}
                      <p>Si deseas cobrar a todas las categorias el mismo valor de inscripción puedes ingresarlo en esta casilla, de lo contrario tendrás que agregar el valor de cada categoría en el siguiente paso</p>
                      {!! Form::number('inscripcion', null , ['class' => 'form-input block w-full mt-1'.($errors->has('lugar')?' border-red-600':'')]) !!}

                      @error('inscripcion')
                          <strong class="text-xs text-red-600">{{$message}}</strong>
                      @enderror
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
                            <p class="mb-2">Carga una imagen  que muestre el contenido de tu evento. Una buena imagen se destaca del resto y llama la atención.</p>
                            {!! Form::file('file', ['class'=>'form-input w-full'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                            @error('file')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-center mt-2">
                        <button href="" class="btn btn-danger mx-4" x-on:click="open=!open">Cancelar</button>
                        {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                    </div>
            {!! Form::close() !!}

        </div>

        @foreach ($evento->fechas as $fecha)

            <div>

                @if (IS_NULL($fecha->fecha))

                    <h2 class="text-lg font-medium text-gray-900 text-center">¿Cuando es su evento?</h2>
                
                {!! Form::model($fecha, ['route'=>['organizador.fechas.update',$fecha],'method' => 'put', 'files'=> true , 'autocomplete'=>'off']) !!}

                    {!! Form::date('fecha', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fecha')?' border-red-600':''),'autocomplete'=>"off"]) !!}
                    
                    <div class="my-4">

                      
                      @if ($evento->type=='carrera')
                          {!! Form::label('name', 'Nombre de la Carrera') !!}
                      @else
                          {!! Form::label('name', 'Nombre de la Fecha') !!}
                      @endif
                      {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}

                      @error('name')
                          <strong class="text-xs text-red-600">{{$message}}</strong>
                      @enderror
                    </div>

                    <div class="my-4">
                      {!! Form::label('lugar', 'Lugar') !!}
                      {!! Form::text('lugar', null , ['class' => 'form-input block w-full mt-1'.($errors->has('lugar')?' border-red-600':'')]) !!}

                      @error('lugar')
                          <strong class="text-xs text-red-600">{{$message}}</strong>
                      @enderror
                    </div>



                    <div class="flex justify-center mt-2">
                        {!! Form::submit('Siguiente', ['class'=>'btn btn-primary']) !!}
                    </div>
                
                {!! Form::close() !!}

                @elseif($fecha->fecha)

                    <div class="bg-gray-100 p-6 mt-6" x-data="{open: false}">
                      <header class="flex justify-between item-center" x-on:click="open=!open" >
                        <h1 class="cursor-pointer"><strong>Fecha:</strong> {{$fecha->name}}</h1>
                        <div>
                            <i class="fas fa-eye cursor-pointer text-blue-500 mr-2" ></i>
                            <i class="fas fa-trash cursor-pointer text-red-500" alt="Eliminar"></i>
                        </div>
                      </header>
                      
                      <div x-show="open">
                        <h1 class="font-bold mt-4"><strong>Lugar:</strong> {{$fecha->lugar}}</h1>
                        <h1 class="font-bold mt-4"><strong>Fecha:</strong> {{$fecha->fecha}}</h1>

                        
                        
                        
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="flex justify-center items-center h-screen">
	<!--actual component start-->
	<div x-data="setup()">

		<ul class="flex justify-center items-center my-4">
			<template x-for="(tab, index) in tabs" :key="index">
				<li class="cursor-pointer py-3 px-4 rounded transition"
					:class="activeTab===index ? 'bg-green-500 text-white' : ' text-gray-500'" @click="activeTab = index"
					x-text="tab"></li>
			</template>
		</ul>
    <div x-show="activeTab===0">
      <h1 class="font-bold mt-12">INGRESA LAS CATEGORIAS</h1>
              <p class="mb-4">Pincha las categorias que deseas incluir en tu eventos</p>
                      
              <div class="flex justify-between">
                  <div class="shaddow h-60 bg-gray-300 w-full mr-2 p-1">
                    @foreach ($categorias as $categoria)
                        <button class="btn bg-red-500 text-white my-1 mx-1" wire:click="selectedcategoria({{$categoria->id}})">
                         {{$categoria->name}}
                        </button>
                    @endforeach

                  </div>
      
                  <div class="my-auto">
                      <img class="h-5 w-8" src="https://cdn-icons-png.flaticon.com/512/4305/4305572.png" alt="">
                  </div>
                  <div class="shaddow h-60 bg-gray-300 w-full ml-2 p-2">
                      <button class="btn bg-green-500 text-white">
                          Expertos
                      </button>
                      <button class="btn bg-green-500 text-white">
                          Damas
                      </button>
                  </div>
                  
              </div>
      </div>
		<div class="w-80 bg-white p-16 h-72 text-center mx-auto border mt-4">
      <div x-show="activeTab===0">
              <div class="bg-blue-900 rounded-lg max-w-sm mx-auto ">
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
			<div x-show="activeTab===1">Content 2</div>
			<div x-show="activeTab===2">Content 3</div>
			<div x-show="activeTab===3">Content 4</div>
		</div>

		
		<div class="flex gap-4 justify-center border-t p-4">
			<button
				class="py-2 px-4 border rounded-md border-blue-600 text-blue-600 cursor-pointer uppercase text-sm font-bold hover:bg-blue-500 hover:text-white hover:shadow"
				@click="activeTab--" x-show="activeTab>0"
				>Anterior</button>
			<button
				class="py-2 px-4 border rounded-md border-blue-600 text-blue-600 cursor-pointer uppercase text-sm font-bold hover:bg-blue-500 hover:text-white hover:shadow"
				@click="activeTab++" x-show="activeTab<tabs.length-1"
				>Siguiente</button>
		</div>
	</div>
	<!--actual component end-->
</div>

<script>
	function setup() {
    return {
      activeTab: 0,
      tabs: [
          "Agregar Categoria",
          "Valor de Inscripción",
          "Limite de Inscritos",
          "Quitar Categoria",
      ]
    };
  };
</script>

<!--
# Changelog:

## [1.1] - 2021-05-01
### Added
 - Back/Next buttons

## [1.0] - 2021-05-01
### Added
 - Nav bar with two styles
 - Set tabs title dynamically and render on page
-->
                        
                        <div class="flex" x-on:click="categoria=!categoria">
                            <div class="max-w-lg mx-auto">
                                <div class="text-center mt-12">
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
                      
                
        


                @endif


              

                
            </div>
            
        @endforeach

        



        

        
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
