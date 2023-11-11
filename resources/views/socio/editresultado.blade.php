<x-app-layout>

    
    <x-slot name="ft">
        @if (str_contains($socio->user->profile_photo_url,'https://ui-'))
            
            <link rel="shortcut icon" href="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg">
           
        @else
            <link rel="shortcut icon" href="{{ $socio->user->profile_photo_url }}">
        @endif
       
    </x-slot>

    <x-slot name="tl">
            
        <title>{{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}</title>
        
        
    </x-slot>
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection
    

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
                    
        <div x-data="{fullview: false}" >            
            <div x-show="fullview" x-on:click="fullview=false" class="fixed top-0 left-0 right-0 bottom-0 flex justify-center items-center bg-white">
                <div class="flex items-center" x-on:click="fullview=false">
                    @if (str_contains($socio->user->profile_photo_url,'https://ui-'))
                        <img class="w-full object-contain"
                        src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg"
                        alt="Rider Chileno">
                    @else
                        <img class="w-full object-contain"
                        src="{{ $socio->user->profile_photo_url }}"
                        alt="{{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}">
                    @endif
                </div>
            </div>
            

            @php
                $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
            @endphp
            <style>
                :root {
                    --main-color: #4a76a8;
                }

                .bg-main-color {
                    background-color: var(--main-color);
                }

                .text-main-color {
                    color: var(--main-color);
                }

                .border-main-color {
                    border-color: var(--main-color);
                }
            </style>


            <div class="bg-gray-100 min-h-screen pb-6">
                <div class="w-full text-white bg-main-color hidden sm:block">
                    <div x-data="{ open: false }"
                        class="flex flex-col max-w-screen-xl py-5 sm:py-0 px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                        <div class="flex flex-row items-center justify-between p-4 ">
                            <a href="{{route('socio.show',$resultado->user->socio)}}"                                                  
                                class="hidden md:inline text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline cursor-pointer"><i class="fas fa-arrow-circle-left text-white-800"></i> Seguir Navegando</a>
                        
                        </div>
                    </div>
                </div>
                <!-- End of Navbar -->

                <div class="max-w-7xl mx-auto mb-5 flex justify-center">
                        <div class="flex no-wrap md:-mx-2">
                        <!-- Left Side -->
                       
                            <!-- End of profile card -->
                            <div class="my-4">

                            </div>
                            <!-- Friends card -->
                            
                            <!-- End of friends card -->
                        </div>
                        <!-- Right Side -->
                        <div class="w-full md:w-9/12 justify-center mx-auto sm:mx-2">
                            <!-- Profile tab -->
                            <!-- About Section -->
                          

                            <!-- End of about section -->

                           

                            <!-- garage and movie -->
                           
                            <div class="bg-white shadow-sm rounded-sm">
                                <div class="px-3 pt-3 flex justify-between items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                    <div>
                                        <span class="text-red-500">
                                            <i class="fas fa-film text-white-800"></i>
                                        </span>
                                        <span>Nuevo Registro Curriculum Deportivo</span>
                                    </div>
                                    <div>
                                    
                                </div>   
                                </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2">

                                        <div class="order-2 lg:order-1 bg-white px-3 hover:shadow">
                                           

                                            <!-- This is an example component -->
                                            @can('Super admin')
                                                
                                                        
                                                <form action="{{route('garage.uploadresultado',$resultado)}}"
                                                    method="POST"
                                                    class="dropzone"
                                                    id="my-awesome-dropzone">
                                                    <div class="dz-message " data-dz-message>
                                                    <h1 class="text-xl font-bold">Seleccione Imágenes</h1>
                                                    <span>Utiliza fotos sacadas de dia donde puedas mostrar todos los detalles importantes de tu Vehiculo</span>
                                                    </div>
                                                </form>

                                                @livewire('socio.resultado-image', ['resultado' => $resultado])

                                                <div class="flex md:hidden justify-between my-2">
                                                    <a href="{{route('socio.show',$resultado->user->socio)}}"  >
                                                        <button class="hover:shadow-form btn btn-danger py-3 px-8 text-base font-semibold text-white outline-none">
                                                            Cancelar
                                                        </button>
                                                    </a>
                                                    {!! Form::model($resultado, ['route'=>['socio.resultados.update',$resultado],'method' => 'put', 'files'=> true , 'autocomplete'=>'off']) !!}
                                                        {!! Form::hidden('status', 2 ) !!}
                                                    <button class="hover:shadow-form btn btn-success py-3 px-8 text-base font-semibold text-white outline-none">
                                                    Publicar
                                                    </button>
                                                </div>

                                            
                                            @endcan
                                           
                                        </div>
                                        
                                    
                                        
                                        <div class="order-1 lg:order-2 bg-white px-3 hover:shadow">
                                        
                                            @can('perfil_propio', $socio)
                                                <div class="mx-auto w-full max-w-[550px]">
                                                   
                                                    
                                                    <div class="mb-4">
                                                        {!! Form::label('titulo', 'Titulo') !!}
                                                        {!! Form::text('titulo', null , ['class' => 'w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md'.($errors->has('titulo')?' border-red-600':''), 'placeholder'=>'Nombre o Resultado del Evento/Competencia']) !!}
                                
                                                        @error('titulo')
                                                            <strong class="text-xs text-red-600">{{$message}}</strong>
                                                        @enderror
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div class="mb-4">
                                                            {!! Form::label('fecha', 'Fecha') !!}
                                                            {!! Form::date('fecha', null , ['class' => 'w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md'.($errors->has('titulo')?' border-red-600':''), 'placeholder'=>'Nombre o Resultado del Evento/Competencia']) !!}
                                    
                                                            @error('fecha')
                                                                <strong class="text-xs text-red-600">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            {!! Form::label('disciplina_id', 'Disciplina') !!}
                                                            {!! Form::select('disciplina_id', $disciplinas, $resultado->user->socio->disciplina_id , ['class'=>'form-input block w-full mt-1']) !!}
                                                        </div>
                                                       
                                                    </div>

                                                    @php
                                                        $lugares = array_merge(['No recuerdo'], array_map(function ($numero) {
                                                                return $numero . '°';
                                                            }, range(1, 200)));

                                                    @endphp

                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div class="mb-4 items-center my-auto">
                                                           <p>En que lugar terminaste la carrera?</p>
                                                        </div>
                                                        <div>
                                                         
                                                            {!! Form::select('lugar', $lugares , null  , ['class'=>'form-input block w-full mt-1']) !!}
                                                        </div>
                                                       
                                                    </div>

                                                  
                                                    <div class="mb-4">
                                                        {!! Form::label('descripcion', 'Descripción') !!}
                                                        {!! Form::textarea('descripcion', null , ['class' => 'w-full rounded-md border border-[#e0e0e0] bg-white px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md', 'placeholder'=>'Descripción....']) !!}
                                                        
                                                        @error('descripcion')
                                                            <strong class="text-xs text-red-600">{{$message}}</strong>
                                                        @enderror
                                                    </div>
                                                  
                                             
                                                    <div class="hidden md:flex justify-end my-2">
                                                       
                                                        <button class="hover:shadow-form btn btn-success py-3 px-8 text-base font-semibold text-white outline-none">
                                                        Publicar
                                                        </button>
                                                    </div>

                                                    {!! Form::close() !!}

                                                    <div class="hidden justify-end my-2">
                                                        <a href="{{route('socio.show',$resultado->user->socio)}}">
                                                            <button class="hover:shadow-form btn btn-danger py-3 px-8 text-base font-semibold text-white outline-none">
                                                                Cancelar
                                                            </button>
                                                            </div>
                                                        </a>
                                              </div>
                                            @endcan
                                           
                                        
                                        </div>

                                    </div>

                                  
                                    <!-- End of Experience and education grid -->
                                </div>
                            <div class="flex justify-end">
                                <form action="{{route('socio.resultados.destroy',$resultado)}}" method="POST">
                                    @csrf
                                    @method('delete')
                    
                                    <button class="text-right p-4 text-red-500 cursor-pointer"> ( Eliminar )</button>
                                </form>
                            </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
             
          
        </div>
    </x-fast-view>

    <x-slot name="js">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
        <script>
          Dropzone.options.myGreatDropzone = { // camelized version of the `id`
            headers:{
              'X-CSRF-TOKEN' : "{!! csrf_token() !!}"
            },
            acceptedFiles: "image/*",
            maxFiles: 6,
              };
        </script>
  
    </x-slot>
      

</x-app-layout>