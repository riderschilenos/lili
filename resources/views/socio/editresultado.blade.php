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
                            <a href="{{route('socio.index')}}"
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
                                    <div class="grid grid-cols-1 sm:grid-cols-2">

                                        <div class="order-2 lg:order-1 bg-white p-3 hover:shadow">
                                            <div class="flex justify-between mb-2 items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                <div>
                                                    <span class="text-red-500">
                                                        <i class="fas fa-film text-white-800"></i>
                                                    </span>
                                                    <span>Curriculum Deportivo</span>
                                                </div>
                                                <div>
                                                
                                                </div>   
                                            </div>

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
                                            
                                            @livewire('socio.curriculum-deportivo',['socio' => $socio], key('curriculum-deportivo'.$socio->slug))

                                    
                                            @endcan
                                            <div class="grid grid-cols-4 gap-4 hidden">
                                            
                                                @if ($socio->user->serie_enrolled)
                                                    
                                                
                                                    @foreach ($socio->user->serie_enrolled as $serie)
                                                        <div class="text-center my-2">
                                                            <a href="{{route('series.show', $serie)}}" class="text-main-color">
                                                                <img class="h-16 w-20 mx-auto"
                                                                src="{{Storage::url($serie->image->url)}}"
                                                                alt="">
                                                            </a>
                                                        </div>
                                                    @endforeach

                                                @endif
                                                                    
                                            </div>
                                        </div>
                                        
                                    
                                        
                                        <div class="order-1 lg:order-2 bg-white p-3 hover:shadow">
                                        
                                            @can('perfil_propio', $socio)
                                                @if (auth()->user()->strava)
                                                    
                                            
                                                    <div class="bg-green-50 p-6 rounded shadow-md items-center ">
                                                    
                                                        <div class="flex items-center justify-between">
                                                            <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                            <div>
                                                                <h2 class="text-lg font-semibold">Perfil de Strava Conectado</h2>
                                                                <p class="text-gray-600 mt-1">¡Tu perfil de Strava ya está conectado y listo para que participes en eventos virtuales!</p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4 flex justify-between">
                                                            <a href="#" class="text-blue-500 hover:underline hover:text-blue-600 transition duration-300 ml-4">
                                                                Desconectar Perfil
                                                            </a>
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Logo_Strava.png" alt="Logo de Strava" class="object-cover h-6">
                                                        </div>
                                                    
                                                    </div>
                                                @else
                                                    
                                                    

                                                    <div class="bg-white p-6 rounded shadow-md">
                                                        <h2 class="text-lg font-semibold mb-2">Enlazar perfil de Strava</h2>
                                                        <div class="my-2">
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Logo_Strava.png" alt="Logo de Strava" class="object-cover h-14">
                                                        </div>
                                                        <p class="text-gray-600">Conecta tu cuenta de Strava para acceder a tus actividades.</p>
                                                        <div class="flex justify-center">
                                                            <a href="https://www.strava.com/oauth/authorize?client_id=112140&response_type=code&redirect_uri=https://riderschilenos.cl/redireccion-strava&scope=profile:read_all,activity:read_all" class=" bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out">
                                                                Enlazar con Strava
                                                            </a>
                                                        </div>
                                                        
                                                        <p class="mt-4 text-sm text-gray-500">
                                                            Al hacer clic en "Enlazar con Strava", serás redirigido a Strava para autorizar la conexión.
                                                        </p>
                                                    </div>
                                                @endif
                                            @endcan
                                            <div class="bg-blue-500 py-16">
                                                <div class="container mx-auto text-center">
                                                    <h1 class="text-white text-4xl font-semibold mb-4">¡Desafío Strava! 15 y 30Km Online!</h1>
                                                    <p class="text-white text-lg mb-8">Demuestra tu constancia montando a la bicicleta y participa de este desafio virtual.</p>
                                                    <a href="https://riderschilenos.cl/eventos/desaf-o-riderschilenos-ft-strava" class="bg-white text-blue-500 hover:bg-blue-100 text-lg font-semibold py-2 px-6 rounded-full">Regístrate ahora</a>
                                                </div>
                                            </div>
                                            <ul class="list-inside space-y-2 ml-2 hidden">
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="text-yellow-600">
                                                            <i class="fas fa-dumbbell text-white-800"></i>
                                                        </span>
                                                        <div class="ml-4">
                                                            <div class="text-teal-600">50 Min Pesas.</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="text-yellow-600">
                                                            <i class="fas fa-bicycle text-white-800"></i>
                                                        </span>
                                                        <div class="ml-4">
                                                            <div class="text-teal-600">70km Bicicleta</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="text-yellow-600">
                                                            <i class="fas fa-running"></i>
                                                        </span>
                                                        <div class="ml-4">
                                                            <div class="text-teal-600">10k running</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="text-yellow-600">
                                                            <i class="fas fa-bicycle text-white-800"></i>
                                                        </span>
                                                        <div class="ml-4">
                                                            <div class="text-teal-600">70km Bicicleta</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        
                                        </div>

                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-1">
                                        <div class="bg-white hover:shadow">
                                            <div class="items-center p-3 flex justify-between space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                
                                                <div>
                                                    <span class="text-red-500">
                                                        <i class="fas fa-car text-white-800"></i>
                                                    </span>
                                                    <span>Garage</span>
                                                </div>

                                                <div>
                                                                @can('perfil_propio', $socio)  
                                                                <a href="{{route('garage.vehiculo.create')}}"><span class="btn btn-success text-white font-bold text-sm align-middle">Inscribir Vehículo</span></a>
                                                                @endcan
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="grid grid-cols-1 p-1 md:grid-cols-4 gap-1"> 

                                                @if ($socio->user->vehiculos)
                                                    
                                                    @php
                                                        $n=0;
                                                    @endphp
                                                    @foreach ($socio->user->vehiculos as $vehiculo)
                                                        @if($vehiculo->status==5 || $vehiculo->status==6)
                                                            <div class="hidden md:block">
                                                                    
                                                                <div class="text-center p-2 m-2 bg-main-color rounded-xl">
                                                                    <a href="{{route('garage.vehiculo.show', $vehiculo)}}" class="text-main-color">
                                                                        @if($vehiculo->image->first())
                                                                            <img class="h-44 w-42 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                                                                        @else
                                                                            <img class="h-44 w-42 object-cover" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                                                                        @endif   
                                                                    
                                                                        <a href="{{route('garage.vehiculo.show', $vehiculo)}}"> 
                                                                            <h1 class="text-white mt-1 font-bold text-md">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).'-'.$vehiculo->cilindrada.'cc '.$vehiculo->año}}</h1>
                                                                        </a>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="block md:hidden">
                                                                    <x-vehiculo-card2 :vehiculo="$vehiculo" />    
                                                            </div>
                                                            @php
                                                                $n+=1;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                
                                                @endif
                                            
                                            </div>
                                            @if ($n==0)
                                                <div class="max-w-3xl flex justify-center mb-6 mt-4">
                                                    <div class="flex justify-between py-6 px-4 bg-gray-200 rounded-lg mx-2">
                                                        <div class="flex items-center space-x-4">
                                                            <img src="{{asset('img/bike.png')}}" class="h-14 w-14" alt="">
                                                            <div class="flex flex-col space-y-1">
                                                                <span class="font-bold">{{ $socio->name}} Aun no Registra su Garage</span>
                                                                <span class="text-sm text-center">Pronto nuevas novedades 🔥</span>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <!-- End of Experience and education grid -->
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