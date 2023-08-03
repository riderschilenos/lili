@props(['series','riders','autos','socio2','disciplinas'])
<div>
    <style>
    :root {
        --main-color: #4a76a8;
        --rider-color: #314780;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .bg-rider-color {
        background-color: var(--rider-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
    </style>

    @if (auth()->user())
        @if (auth()->user()->socio)

            @if (auth()->user()->vehiculos->count())
                
            @else

                <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 my-4 @routeIs('garage.vehiculo.create') hidden @endif">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="success">
                    <strong class="font-bold">Falta poco!</strong>
                    <span class="block sm:inline">Ahora puedes registrar tu moto o bicicleta, esto te permitira registrar sus servicios y mantenciones, entre otras cosas.</span>
                    <a href="{{route('garage.vehiculo.create')}}">
                        <button class="bg-green-600 block w-full text-white text-sm font-semibold rounded-lg hover:bg-green-400 focus:outline-none focus:shadow-outline focus:bg-green-400 hover:shadow-xs p-3 my-4">Registrar</button>
                    </a>                                                
                </div>
                </div>


                
            @endif



        @else

            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 my-4 @routeIs('socio.create') hidden @endif">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Bienvenido!</strong>
                <span class="block sm:inline">Ahora puedes crear el perfil de Rider que te servira para registrar tu moto o bicicleta, registrar tus logros deportivos, contratar cursos o clases, entre otras cosas.</span>
                <a href="{{route('socio.create')}}">
                    <button class="bg-green-500 block w-full text-white text-sm font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:shadow-outline focus:bg-gray-500 hover:shadow-xs p-3 my-4">CREAR PERFIL</button>
                </a>                                                
            </div>
        </div>
            
        @endif
        
    @endif

    <div :class="{'block': user, 'hidden': ! user}" class="hidden">
        @if($socio2)
            <div>
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
            
            
                <div class="bg-gray-100  min-h-screen pb-6">
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
            
                    <div class="max-w-7xl mx-auto mb-5">
                        <div class="md:flex no-wrap md:-mx-2 ">
                            <!-- Left Side -->
                            <div class="w-full md:w-3/12 md:mx-2"  x-data="{open: true}">
                                <!-- Profile Card -->
                                            @switch($socio2->status)
                                                            @case(1)
                                                            <div class="bg-white p-3 border-t-4 border-green-500">
                                                                @break
                                                            @case(2)
                                                            <div class="bg-white p-3 border-t-4 border-red-400">
                                                                @break
                                                            @default
                                                                
                                            @endswitch
                                            <div class="flex items-center space-x-2 mb-2 font-semibold text-gray-900 leading-8 justify-between">
                                                    <div class="flex items-center">
                                                        <span clas="text-green-500">
                                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                            </svg>
                                                        </span>
                                                            <p class="ml-2 tracking-wide">{{ $socio2->name." ".$socio2->second_name }} {{ $socio2->last_name }} </p>
                                                            
                                                    </div>
                                                        @can('perfil_propio', $socio2)
                
                                                        
                                                            <a href="{{route('socio.edit',$socio2)}}" class="ml-2"><h5 class="text-blue-600 font-bold text-sm cursor-pointer ml-4">(Editar)</h5></a>
                                                        
                                                        @endcan
                                                        
                                                   
                                            </div>
                                
                                                    <div class="flex">
                                                        <div class="">
                                                            <div class="image overflow-hidden">
                                                                <img class="h-auto w-44 mx-auto object-cover"
                                                                    src="{{ $socio2->user->profile_photo_url }}"
                                                                    alt="">
                                                            </div>
                                                            @can('perfil_propio', $socio2)
                                                                <h1 class="text-gray-400 font-bold text-xs leading-8 my-1 ml-auto"><a href="{{ route('profile.show') }}">Editar Foto</a></h1>
                                                            @endcan
                                                        </div>
                                                        <div class="col-spam-3 px-4 w-full">
                                                            <a href="{{route('socio.show', $socio2)}}">
                                                                <h1 class="text-blue-400 font-bold text-lg leading-8 mb-1">{{ '@'.$socio2->slug }}</h1>
                                                            </a>  
                                                            <div class="flex content-center">
                                                                <div class="px-2 py-2 text-red-500 font-semibold content-center">
                                                                    <i class="fas fa-birthday-cake content-arount" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="px-2 py-2 text-sm">{{date('d-m-Y', strtotime($socio2->born_date))}}</div>
                                                            </div>
                                                          
                                                                <div class="flex">
                                                                    @if($socio2->direccion)
                                                                        <div class="px-2 py-2 text-red-500 font-semibold">
                                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                        </div>                  
                                                                        
                                                                        <div class="px-2 py-2">{{Str::limit($socio2->direccion->comuna.', '.$socio2->direccion->region,20)}}</div>
                                                                    @endif
                                                                </div>
                                                                <div class="text-gray-700">
                                           
                                        
                                                                    <button x-on:click="open=false" x-show="open" class="bg-gray-100 block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Información de Contácto</button>
                                                                    <button x-on:click="open=true" x-show="!open" class="bg-gray-100 block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Resume</button>
                                                               </div>
                                                                @if($socio2->user->vendedor) 
                                                                    @if($socio2->user->vendedor->estado==2) 
                                                                        @if($socio2->fono) 
                                                                            <div >
                                                                                <a href="{{route('socio.store.show', $socio2)}}">
                                                                                    <button class="bg-red-600 block w-full text-white text-sm font-semibold rounded-lg hover:bg-red-500 focus:outline-none focus:shadow-outline focus:bg-red-500 hover:shadow-xs p-3 my-4">TIENDA ONLINE</button>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                        </div>
                                                    </div>

                                                    <div class="grid md:grid-cols-2 text-sm">
                                            
                                                
                                                        <div x-show="!open">
                                                            @if($socio2->fono)
                                                                <div class="grid grid-cols-2">
                                                                    <div class="px-4 py-2 font-semibold">Nro. Contacto</div>
                                                                    <div class="px-4 py-2">{{ $socio2->fono }}</div>
                                                                </div>
                                                            @endif
                                                            
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Email.</div>
                                                                <div class="px-4 py-2">
                                                                    <a class="text-blue-800" href="mailto:jane@example.com">{{$socio2->user->email}}</a>
                                                                </div>
                                                            </div>
                    
                                                        </div>
                                                    </div>
                                                          
                                                            @livewire('socio.socio-auspiciadores',['socio' => $socio2], key('socio-auspiciadores.'.$socio2->slug))
                                                            <ul
                                                                class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm hidden">
                                                                <li class="flex items-center py-3">
                                                                    <span>Suscripción</span>
                                                                        @switch($socio2->status)
                                                                                @case(1)
                                                                                    <span class="ml-auto"><span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Vigente</span></span>
                                                                                    @break
                                                                                @case(2)
                                                                                    <span class="ml-auto"><span class="bg-red-500 py-1 px-2 rounded text-white text-sm">INACTIVO</span></span>
                                                                                    @break
                                                                                @default
                                                                                    
                                                                        @endswitch
                                                                        
                                                                </li>
                                                                {{-- comment
                                                                @if($socio->suscripcions)
                                                                    @if($socio->suscripcions->count())
                                                                    
                                                                        <li class="flex items-center py-3">
                                                                            <span>Fecha Vencimiento</span>
                                                                            <span class="ml-auto">{{date('d', strtotime($socio->suscripcions->first()->end_date)).' de '.$meses[date('n', strtotime($socio->suscripcions->first()->end_date))-1].' del '.date('Y', strtotime($socio->suscripcions->first()->end_date))}}</span>
                                                                        </li>
                                                                    @endif
                                                                @endif --}}
                                                            </ul>
                                                    </div>
                                                        
                                <!-- End of profile card -->
                                <div class="my-4"></div>
                            
                                
                                <!-- End of friends card -->
                            </div>
                            <!-- Right Side -->
                            <div class="w-full md:w-9/12 mx-0 sm:mx-2 h-64">
                                <!-- Profile tab -->
                                <!-- About Section -->
                                
                                <!-- End of about section -->
            
                                <div class="my-4"></div>
            
                                <!-- garage and movie -->
                                <div class="bg-white shadow-sm rounded-sm">
            
                                    <div class="grid grid-cols-1 sm:grid-cols-2">
                                        <div class="bg-white p-3 hover:shadow ">
                                            <div class="items-center flex justify-between space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                <div>
                                                    <span class="text-red-500">
                                                        <i class="fas fa-car text-white-800"></i>
                                                    </span>
                                                    <span>Garage</span>
                                                </div>
                                                <div>
                                                                @can('perfil_propio', $socio2)
                                                                <a href="{{route('garage.vehiculo.create')}}"><span class="text-blue-600 font-bold text-sm align-middle"> (Inscribir Vehiculo)</span></a>
                                                                @endcan
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="grid grid-cols-2 gap-1 mt-4">
            
                                                @if ($socio2->user->vehiculos)
                                                    
                                                
                                                    @foreach ($socio2->user->vehiculos as $car)
                                                        @if($car->status==5 || $car->status==6)
                                                        
                                                            <div class="text-center p-2 m-2 bg-main-color rounded-xl">
                                                                <a href="{{route('garage.vehiculo.show', $car)}}" class="text-main-color">
                                                                    <img class="h-24 mx-auto" src="{{Storage::url($car->image->first()->url)}}" alt="">
                                                                    <a href="{{route('garage.vehiculo.show', $car)}}">
                                                                        <h1 class="text-white mt-1 font-bold text-md">{{$car->marca->name}}<br>{{strtoupper($car->modelo).$car->cilindrada.' '.$car->año}}</h1>
                                                                    </a>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endforeach
            
                                                @endif
                                                {{-- comment 
                                                
                                                    <div class="text-center my-2">
                                                        <img class="h-24 w-34 mx-auto"
                                                            src="https://www.canyon.com/on/demandware.static/-/Sites-canyon-master/default/dwb5b29ea2/images/full/full_2021_/2021/full_2021_sender-cfr_2251_tm_P5.png"
                                                            alt="">
                                                        <a href="#" class="text-main-color">Kojstantin</a>
                                                    </div>
                                                    <div class="text-center my-2">
                                                        <img class="h-26 w-36 mx-auto"
                                                            src="https://www.motofichas.com/images/phocagallery/Honda/crf250r-2022/02-honda-crf250r-2022-estudio.jpg"
                                                            alt="">
                                                        <a href="#" class="text-main-color">James</a>
                                                    </div>
                                                    <div class="text-center my-2">
                                                        <img class="h-26 w-36 mx-auto"
                                                            src="https://i.ytimg.com/vi/qmfxU0KMBBg/maxresdefault.jpg"
                                                            alt="">
                                                        <a href="#" class="text-main-color">Natie</a>
                                                    </div>
                                                --}}
                                            </div>
                                        </div>
                                        <div class="bg-white p-3 hover:shadow">
                                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                <span class="text-red-500">
                                                    <i class="fas fa-film text-white-800"></i>
                                                </span>
                                                <span>Mis Cursos</span>
                                                
                                                <span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Pronto)</span>
                                                            
                                            </div>
                                            <div class="grid grid-cols-4 gap-4 hidden">
                                            
                                                @if ($socio2->user->serie_enrolled)
                                                    
                                                
                                                    @foreach ($socio2->user->serie_enrolled as $serie)
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
                                        <div class="bg-white p-3 hover:shadow hidden">
                                            <div class="items-center flex space-x-3 font-semibold text-gray-900 text-xl leading-8 mb-3">
                                                <span class="text-red-500">
                                                    <i class="fas fa-dumbbell text-white-800"></i>
                                                </span>
                                                <span>Entrenamientos</span>
                                                
                                                                
                                                                <a href="{{route('socio.entrenamiento',$socio2)}}"><span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Ver más)</span></a>
                                                            
                                                            
                                                
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
                                    <!-- End of Experience and education grid -->
                                </div>
            
                                <div class="my-4">
                                
                                <div class="bg-white pt-3 pb-12 shadow-sm rounded-sm">
            
                                    <div class="mb-12 grid grid-cols-1 sm:grid-cols-2">
                                    
                                        <div class="bg-white p-3 hover:shadow">
                                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                <span class="text-red-500">
                                                    <i class="fas fa-film text-white-800"></i>
                                                </span>
                                                <span>MovieCollection</span>
                                                
                                                <a href="{{route('series.index')}}"><span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Ver más)</span></a>
                                                            
                                            </div>
                                            <div class="grid grid-cols-4 gap-4">
                                            
                                                @if ($socio2->user->serie_enrolled)
                                                    
                                                
                                                    @foreach ($socio2->user->serie_enrolled as $serie)
                                                        <div class="text-center my-2">
                                                            <a href="{{route('series.show', $serie)}}" class="text-main-color">
                                                                <img class="h-16 w-20 mx-auto"
                                                                src="{{Storage::url($serie->image->url)}}"
                                                                alt="">
                                                            </a>
                                                        </div>
                                                    @endforeach
            
                                                @endif
                                                    {{-- 
                                                    <div class="text-center my-2">
                                                        <img class="h-16 w-16 rounded-full mx-auto"
                                                            src="https://widgetwhats.com/app/uploads/2019/11/free-profile-photo-whatsapp-4.png"
                                                            alt="">
                                                        <a href="#" class="text-main-color">James</a>
                                                    </div>
                                                    <div class="text-center my-2">
                                                        <img class="h-16 w-16 rounded-full mx-auto"
                                                            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                                            alt="">
                                                        <a href="#" class="text-main-color">Natie</a>
                                                    </div>
                                                    <div class="text-center my-2">
                                                        <img class="h-16 w-16 rounded-full mx-auto"
                                                            src="https://bucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com/public/images/f04b52da-12f2-449f-b90c-5e4d5e2b1469_361x361.png"
                                                            alt="">
                                                        <a href="#" class="text-main-color">Casey</a>
                                                    </div>
                                                    --}}
                                                    
                                            </div>
                                        </div>
                                            {{-- commen
                                        <div>
                                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                                <span clas="text-green-500">
                                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                        <path fill="#fff"
                                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                    </svg>
                                                </span>
                                                <span class="tracking-wide">Education</span>
                                            </div>
                                            <ul class="list-inside space-y-2">
                                                <li>
                                                    <div class="text-teal-600">Masters Degree in Oxford</div>
                                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                </li>
                                                <li>
                                                    <div class="text-teal-600">Bachelors Degreen in LPU</div>
                                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                </li>
                                            </ul>
                                        </div>t --}}
                                    </div>
                                    
                                </div> 
            
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else

            <x-jet-authentication-card>
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>
        
                <x-jet-validation-errors class="mb-4" />
        
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="flex justify-center mt-4 ">

                    <a href="https://riderschilenos.cl/login-google">
                        <button class="btn bg-blue-500 text-white w-full max-w-xs items-center justify-items-center mr-2 mt-2"><svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>Ingresar Con Google<div></div></button>
                    </a>
                
                </div>
        
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recordar mi cuenta') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-auto" href="{{ route('register') }}">
                            {{ __('Registrarme') }}
                            </a>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Recuperar contraseña') }}
                            </a>
                        @endif
        
                        <x-jet-button class="ml-4">
                            {{ __('Ingresar') }}
                        </x-jet-button>
                    </div>
                </form>
            </x-jet-authentication-card>

        @endif
    </div>
    
    <div :class="{'block': home, 'hidden': ! home}" class="hidden">


                {{--         <div id="default-carousel" class="hidden sm:block mx-auto relative max-w-7xl md:mt-16" data-carousel="static" style='z-index: 1 ; '>
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <span class="hidden absolute text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                            <img src="{{asset('img/homeslider/carcasas-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('img/homeslider/polerones-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('img/homeslider/poleras-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('img/homeslider/tienda-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <button type="button" class="w-3 h-3 mb-4 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
        comment --}}
        <section class="hidden md:hidden mt-12 sm:mt-16">
                    

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
                    <article>
                        <figure>
                            <a href="catalogos/polerones.pdf"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/mobileslider/polerones-min.png')}}" alt=""></a>
                        </figure>

                    
                    </article>
                    <article>
                        <figure>
                            <a href="{{route('catalogo.carcasas')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/mobileslider/carcasas-min.png')}}" alt=""></a>
                        </figure>
                    
                    </article>
                    <article>
                        <figure>
                            <a href="catalogos/catalogopolerasmx_compressed.pdf"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/mobileslider/poleras-min.png')}}" alt=""></a>
                        </figure>
                    
                    </article>
                
                
                </div>

        </section>
        
        <figure class="hidden pt-0 pb-4">

        
           
                <ul class="slider snap-mandatory flex overflow-x-auto gap-0 snap-x before:shrink-0 before:w-[30vw] after:shrink-0 after:w-[30vw]" style='z-index: 1 ; '>
                    
                    <li class="hidden shrink-0 snap-center w-full snap-mandatory">       
                        <a href="https://riderschilenos.cl/eventos/mariocross"><img class="" src="{{asset('img/home/mariocross.png')}}" alt="" style="scroll-snap-align: center;"></a>
                    </li>
                    <li class="hidden shrink-0 snap-center w-full snap-mandatory">       
                        <a href="{{route('catalogo.carcasas')}}"><img class="" src="{{asset('img/mobileslider/carcasas-min.png')}}" alt="" style="scroll-snap-align: center;"></a>
                    </li>
                    <li class="hidden shrink-0 snap-center w-full snap-mandatory">       
                        <a href="catalogos/catalogopolerasmx_compressed.pdf"><img class="" src="{{asset('img/mobileslider/poleras-min.png')}}" alt="" style="scroll-snap-align: center;"></a>
                    </li>        
                    <li class="hidden shrink-0 snap-center w-full snap-mandatory">       
                        <a href="https://tienda.riderschilenos.cl"><img class="" src="{{asset('img/mobileslider/tienda-minc.jpg')}}" alt="" style="scroll-snap-align: center;"></a>
                    </li>
                
                </ul>

                <a href="https://tienda.riderschilenos.cl"><img class="hidden" src="{{asset('img/mobileslider/tienda-minc.jpg')}}" alt="" style="scroll-snap-align: center;"></a>
            

        
        </figure>

        
        <section class="bg-cover bg-center hidden sm:hidden" style="background-image: url({{asset('img/home/homefotomini.png')}})">

            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 pt-64 pb-8">
                
                    <h1 class="text-white font-fold text-4xl text-center">RidersChilenos</h1>
                    <p class="text-white text-lg mt-2 mb-4 text-center">Bienvenido al Portal Rider Más Grande del País </p>
                        <!-- component -->
                        <!-- This is an example component -->
                
                    
                
            </div>

        </section>
    

        <section class="sm:mt-8">
            <div class="">

                @if (auth()->user())
                    <div class="max-w-6xl mx-auto px-2 sm:px-6 mt-2 lg:px-8">
                        <div  class="mt-4 text-2xl mb-4 sm:text-xl mx-4 leading-none font-bold text-gray-900 flex justify-between">
                            <div>
                                <h1 class="text-xl mx-2 font-bold cursor-pointer flex items-center" @click="user = true; home = false; socio = false; registro = false; vendedor = false; base = false" >Hola {{Auth()->user()->name}}</h1>
                                @if (auth()->user()->socio)
                                    <a href="{{route('socio.points',auth()->user()->socio)}}">
                                        <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            TIENES 100 PUNTOS
                                        </span>
                                    </a>
                                @else
                                    <a href="{{route('socio.create')}}">
                                        <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            REGISTRATE Y GANA 100 PUNTOS
                                        </span>
                                    </a>
                                @endif
                                
                            </div>
                            <div>
                                <a href="{{route('ticket.historial.view',auth()->user())}}">
                                    <button class=" btn bg-white flex items-center">  <img src="{{asset('img/ticket.png')}}" class="w-8 py-1"> Tickets</button>
                                </a>
                                @if(auth()->user()->vendedor) 
                                    @if(auth()->user()->vendedor->estado==2)
                                        <a href="{{route('vendedor.pedidos.create')}}">
                                            <button class="btn btn-success mt-2 text-center text-xl">Nuevo Pedido</button>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @can('Super admin')
                            <div class="bg-gray-700 pt-4">
                              
                           
            
            
                                <div class="max-w-4xl mx-auto px-2 sm:px-6 mt-2 lg:px-8 pb-4" x-data="{whatsap: true}">
                                         
                                        @livewire('admin.money-info')

                                    <div class="flex justify-between">
                                        
                                        <button class="btn btn-success ml-2 text-center text-xl" x-on:click="whatsap=!whatsap">Whatsapp RCH</button>
                                        
                                        <a href="{{route('contabilidad')}}">
                                            <button class="btn btn-danger ml-2 text-center text-xl">Gráficos y Estadisticas</button>
                                        </a>

                                        

                                    </div>

                                    <div x-show="!whatsap">
            
                                    @livewire('admin.whatsapp-sender-cliente')
            
                                    </div>
                                </div>

                                <div class="max-w-7xl mx-auto px-2 sm:px-6 mt-2 lg:px-8">
                                    @livewire('admin.pedidos-count')
                                </div>
            
                            </div>
                        @endcan    
                
                        @livewire('vendedor.catalogo-productos')
                        
                        <div class="max-w-4xl mx-auto px-2 sm:px-6 mt-2 lg:px-8">
                            @livewire('pistas.admin-pista-home')
                        </div>
           
                   
                                                  
                  

                    <a class="hidden" href="https://riderschilenos.cl/eventos/mariocross">
                        <img class="h-full w-full object-cover object-center" src="{{asset('img/home/mariocross2.png')}}" alt="">
                    </a>

                @else
                   
                    <a class="hidden" href="https://riderschilenos.cl/eventos/mariocross">
                        <img class="h-full w-full object-cover object-center mt-4" src="{{asset('img/home/mariocross2.png')}}" alt="">
                    </a>
                    <div class="flex justify-center ">
                        <div class="bg-white max-w-4xl px-6 pt-2 mb-4 mt-6 shadow-lg rounded-xl">

                            <div class="photo-wrapper flex justify-center mt-2">
                                     <img loading="lazy" class="cursor-pointer h-44 w-44 object-cover rounded-md mx-auto" src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg" alt="">
                            </div>
                            <h1 class="text-center my-2 font-bold">¡Hola!</h1>
                            <h1 class="text-center my-2 font-bold">Bienvenido a Riders Chilenos</h1>
                            <h1 class="text-center my-2 text-md">Ingresa a tu Perfil Online</h1>

                            <div class="flex justify-center mt-2 ">

                                <a href="https://riderschilenos.cl/login-google">
                                    <button class="btn bg-blue-500 text-white w-full items-center justify-items-center mr-2 mt-2"><svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>Ingresar Con Google<div></div></button>
                                </a>
                            
                            </div>
                            <div class="flex justify-center mt-2 mb-6">

                                <a href="{{route('register')}}">
                                    <button class="btn btn-danger w-full max-w-xs items-center justify-items-center mr-2 mt-2">REGISTRO</button>
                                </a>
                                <a href="{{route('login')}}">
                                    <button class="btn btn-danger w-full max-w-xs items-center justify-items-center ml-2 mt-2">INICIAR SESION</button>
                                </a>

                            </div>
                        </div>
                    </div>

                    @livewire('vendedor.catalogo-productos')

                  

                @endif
            </div>
           
          

           

            <div class="bg-main-color flex justify-center pb-4 pt-6 z-10"> 
                <div>
                    @livewire('search')
                </div>
            </div>

            <div class="bg-main-color flex justify-center py-4 z-10"> 
           
              
                
                <div class="pb-4 bg-main-color max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-x-2 gap-y-2">
                    <article>
                        <figure>
                            <a href="{{route('socio.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/RIDERS-min.png')}}" alt=""></a>
                        </figure>

                    
                    </article>
                    <article>
                        <figure>
                            <a href="{{route('garage.vehiculos.registerindex')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/REGISTRO2-min.png')}}" alt=""></a>
                        </figure>
                    
                    </article>
                    <article>
                        <figure>
                            <a href="{{route('garage.usados')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/USADOS2-min.png')}}" alt=""></a>
                        </figure>
                    
                    </article>
                    <article>
                        <figure>
                            <a href="{{route('series.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/VIDEO-min.png')}}" alt=""></a>
                        </figure>
                        
                    </article>
                
                </div>

            </div>
        </section>
        
        <section class="bg-rider-color pb-12 pt-2">
            <h1 class="text-center text-white text-3xl my-4">Registro Nacional de Riders</h1>
            @livewire('socio.socios-count')

            <p class="text-center text-white pt-4">Unete a la comunidad rider más grande del país</p>
            

            <div class="max-w-7xl mx-auto px-4 pt-10 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-4">

                @foreach ($riders as $rider)

                    <x-socio-card :socio="$rider" />
                    
                @endforeach

            </div>

            <div class="flex justify-center mt-4 pt-4">
                <a href="{{route('socio.create')}}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">
                    REGISTRARME AHORA
                </a>
            </div>
            <div class="flex justify-center mt-2 pt-2">
                <a href="{{route('socio.index')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                    Ver Todos
                </a>
            </div>
        
        </section>

        <h1 class="text-center text-3xl  pt-8">¿Buscas Panoramas?</h1>
        <p class="text-center  text-sm pb-4">Lo tenemos para ti</p>

        @livewire('pistas-home')

        <section class="mt-4 bg-rider-color pt-12 pb-50">
            <h1 class="text-center text-3xl text-white pt-16">Ultimos Videos y Carreras</h1>
            <p class="text-center text-white text-sm pb-16">Compra y apoya las producciones nacionales</p>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                @foreach ($series as $peli)

                    <x-serie-card :serie="$peli" />
                    
                @endforeach

            </div>
            <h1 class="text-center text-xs text-white py-12">Todos Los derechos Reservados</h1>
        </section>

        <section class="my-4  py-12">
            <h1 class="text-center text-3xl text-gray-600 font-bold">Compra y Venta Rider</h1>
            <p class="text-center text-gray-500 text-sm mb-6 pb-10">Bicicletas, Motos y Otros.</p>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">

                @foreach ($autos as $auto)

                    <x-vehiculo-card :vehiculo="$auto" />
                    
                @endforeach

            </div>

            <div class="flex justify-center mt-4 pt-4">
                <div class="grid grid-cols-2 gap-2">
                <a href="{{route('garage.vehiculo.vender')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                    Publicar
                </a>
                <a href="{{route('garage.usados')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                    Ver todos
                </a>

                </div>
        
        </section>

       

       
    </div>

    <div :class="{'block': socio, 'hidden': ! socio}" class="hidden">
        
        <div class="max-w-7xl mx-auto pb-8">

            <div class="card">
                
                    
    
                    <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-x-4">
                   
                        <div>
    
                        </div>
                       
                        <div class="hidden sm:block">
                            <div class="flex justify-end mr-4 ">
    
                                
                                    @if(auth()->user())
                                        @if(auth()->user()->socio)
                                            <div class="grid grid-cols-2 gap-2">
                                            <a href="{{ route('socio.show', auth()->user()->socio) }}">
                                                <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Perfil</button>
                                            </a>
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Suscripción</button>
                                            </a>
                                            </div>
                                        @else
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Obtener Suscripción</button>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{route('socio.create')}}">
                                            <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Obtener Suscripción</button>
                                        </a>
                                    @endif    
                                
    
                            </div>
                        </div>
                        <div class="block sm:hidden">
                            <div class="flex justify-center ">
    
                                
                                    @if(auth()->user())
                                        @if(auth()->user()->socio)
                                            <a href="{{ route('socio.show', auth()->user()->socio)}}">
                                                <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Mi Perfil</button>
                                            </a>
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center ml-2">Suscripción</button>
                                            </a>
                                        @else
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{route('socio.create')}}">
                                            <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                        </a>
                                    @endif    
                                
    
                            </div>
                        </div>
                    </div>

                    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-8 mb-6 mt-2">
                        <article>
                            <figure>
                                <a href="{{route('socio.create')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/registroriders.png')}}" alt=""></a>
                            </figure>
        
                        
                        </article>

                    
                    </div>

                    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-8">
                        <article>
                            <figure>
                                <a href="{{route('series.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/VIDEO-min.png')}}" alt=""></a>
                            </figure>
                            
                        </article>
                       
                        <article>
                            <figure>
                                <a href="{{route('garage.usados')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/USADOS2-min.png')}}" alt=""></a>
                            </figure>
                        
                        </article>
                        <article>
                            <figure>
                                <a href="{{route('garage.vehiculos.registerindex')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/REGISTRO2-min.png')}}" alt=""></a>
                            </figure>
                        
                        </article>
                        
                    
                    </div>
    
            
    
                    @livewire('socio.socio-search')
                    
                
            </div>
    
        </div>  

    </div>

    <div :class="{'block': registro, 'hidden': ! registro}" class="hidden">

    </div>

    <div :class="{'block': vendedor, 'hidden': ! vendedor}" class="hidden">
        
        @if(auth()->user()) 
            @if(auth()->user()->vendedor) 
                @if(auth()->user()->vendedor->estado==2) 

                    <div x-data="setup()">
                        <div class="grid grid-cols-3 justify-between">
                            <div>

                            </div>
                            <ul class="flex justify-center items-center my-4">
                                <template x-for="(tab, index) in tabs" :key="index">
                                    <li class="cursor-pointer py-3 px-4 rounded transition"
                                        :class="activeTab===index ? 'bg-red-500 text-white' : ' text-gray-500'" @click="activeTab = index"
                                        x-text="tab"></li>
                                </template>
                            
                            </ul>
                          
                           
                            @if (auth()->user()->vendedor->view==0)
                                <div x-show="activeTab===1">
                                    <form action="{{route('vendedor.view.update', auth()->user()->vendedor)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger max-w-xs items-center mt-5 justify-end ml-12"> <i style="font-size:15px" class="fa">&#xf06e;</i></button>
                                    </form>
                                </div>
                               
                            @elseif (auth()->user()->vendedor->view==1)
                                <div x-show="activeTab===0">
                                    <form action="{{route('vendedor.view.update', auth()->user()->vendedor)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger max-w-xs items-center mt-5 justify-end ml-12"> <i style="font-size:15px" class="fa">&#xf06e;</i></button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div x-show="activeTab===0">
                            
                            @livewire('vendedor.public-show')
                    
                   
                        </div>
                        <div x-show="activeTab===1">
                            @livewire('vendedor.pedidos-index')
                        </div>
                       
                    </div>

                    @if (auth()->user()->vendedor->view==0)
                        <script>
                                function setup() {
                                return {
                                activeTab: 0,
                                tabs: [
                                    "Público",
                                    "Vendedor"
                                ]
                                };
                            };
                        </script>
                    @elseif (auth()->user()->vendedor->view==1)
                        <script>
                                function setup() {
                                return {
                                activeTab: 1,
                                tabs: [
                                    "Público",
                                    "Vendedor"
                                ]
                                };
                            };
                        </script>
                    @endif
                   
                       
                @else
                    

                        <div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
                    
                            <div class="card pb-8 ">
                              
                                  
                    
                                        <div class="justify-between gap-4 bg-red-700">
                                        
                                            <h1 class="px-2 text-3xl font-bold py-4 text-center text-white">Estas a un Paso de Finalizar</h1>
                                            
                                        </div>
                    
                               
                             
                                    <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
                                        <article class="hidden  md:block col-span-2 md:col-span-1">
                                            <figure>
                                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/second3.png')}}" alt="">
                                            </figure>
                                
                                        
                                        </article>
                                        <div class="block  md:hidden col-span-2 md:col-span-1">
                                            <article class="flex justify-center mt-2">
                                                <figure>
                                                    <img class="h-48 object-contain" src="{{asset('img/vendedores/second3.png')}}" alt="">
                                                </figure>
                                            </article>
                                        </div>
                                        <article class="col-span-2 sm:col-span-2">
                                            <figure>
                                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/tree3.png')}}" alt="">
                                            </figure>
                                        
                                        </article>
                                    
                                    
                                    </div>
                                
                           
                                
                                
                                    <div class="justify-between mt-8 bg-gray-200">
                    
                                        <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                                        <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                                    
                                            <article>
                                                <figure>
                                                    <a href="https://www.instagram.com/reel/CVyzsrhpZE3/?utm_source=ig_web_copy_link" target="_blank">
                                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe2.png')}}" alt="">
                                                    </a>
                                                </figure>
                                            
                                            </article>
                                            <div>
                                                <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                                                <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                                    
                                            </div>
                    
                    
                                        </div>
                                
                                    </div>
                                
                                    <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>
                            
                          
                                    <div class="card-body">
                                      
                                            
                                        
   
                    
                                                    
                                                    <h1 class="text-center">Para activar tu registro como vendedor debes hacer el pago correspondiente</h1>
                    
                                                    <h1 class="text-center text-2xl font-bold my-4">{{auth()->user()->name}}</h1>
                                                    
                                                    <div class="cho-container flex justify-center mt-2 mb-4">
                                                        <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                                    </div>
                    
                                                    <div class="flex justify-center">
                                                        <div class="">
                                                            <form action="{{route('vendedor.perfil.destroy',auth()->user()->vendedor)}}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                
                                                                <button class="btn btn-danger btn-sm" type="submit"> Cancelar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                    
                                                    
                                           
                                    
                                    
                                </div>
                            </div>
                    
                        </div>
                    
                   
                    
                @endif

            @else
           
                {{-- comment
                    @livewire('vendedor.catalogo-productos')
                --}}
            
            
                <div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
            
                    <div class="card pb-8 ">
                        
                            
            
                            
            
                                <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-4 lg:mx-14">
                                    <article class="col-span-2 sm:col-span-2">
                                        <figure>
                                            <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/first.png')}}" alt=""></a>
                                        </figure>
                            
                                    
                                    </article>
                                    <article  class="hidden md:block mx-10">
                                        @if (auth()->user())
                                            <figure>
                                                <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                                            </figure>
                                        @else
                                            <div class="bg-red-600 rounded-lg max-w-sm mx-auto">
                                                <h1 class="text-3xl text-center font-bold text-white pt-4">ACCESO RIDERS</h1>
                                                
                                                <div class="flex justify-center mb-4 ">
                                                    
                                                <div class="block w-full mx-4 pb-4">
                                                    
                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf
                                            
                                                        <div>
                                                            <x-jet-label for="email" value="{{ __('Email') }}" class="text-white" />
                                                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                                        </div>
                                            
                                                        <div class="mt-4">
                                                            <x-jet-label for="password" value="{{ __('Contraseña') }}" class="text-white"/>
                                                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                                        </div>
                                            
                                                        <div class="block mt-4">
                                                            <label for="remember_me" class="flex items-center">
                                                                <x-jet-checkbox id="remember_me" name="remember" />
                                                                <span class="ml-2 text-sm text-white">{{ __('Recordar mi cuenta') }}</span>
                                                            </label>
                                                        </div>
                                            
                                                        <div class="flex items-center justify-end mt-4">
                                                            @if (Route::has('password.request'))
                                                                <a class="underline text-sm text-white hover:text-gray-900 mr-auto" href="{{ route('register') }}">
                                                                {{ __('Registrarme') }}
                                                                </a>
                                                            
                                                            @endif
                                            
                                                            <x-jet-button class="ml-4">
                                                                {{ __('Ingresar') }}
                                                            </x-jet-button>
                                                        </div>
                                                    </form>
                                                </div> 
                                                </div>
                                            </div>
                                        @endif
            
                                    </article>
                                </div>
            
                           
                       
                            <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
                                <article class="hidden  md:block col-span-2 md:col-span-1">
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/second3.png')}}" alt="">
                                    </figure>
                        
                                
                                </article>
                                <div class="block  md:hidden col-span-2 md:col-span-1">
                                    <article class="flex justify-center mt-2">
                                        <figure>
                                            <img class="h-48 object-contain" src="{{asset('img/vendedores/second3.png')}}" alt="">
                                        </figure>
                                    </article>
                                </div>
                                <article class="col-span-2 sm:col-span-2">
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/tree3.png')}}" alt="">
                                    </figure>
                                
                                </article>
                            
                            
                            </div>
                        
                   
                       
                        
                            <div class="justify-between mt-8 bg-gray-200">
            
                                <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                                <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                            
                                    <article>
                                        <figure>
                                            <a href="https://www.instagram.com/reel/CVyzsrhpZE3/?utm_source=ig_web_copy_link" target="_blank">
                                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe2.png')}}" alt="">
                                            </a>
                                        </figure>
                                    
                                    </article>
                                    <div>
                                        <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                                        <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                            
                                    </div>
            
            
                                </div>
                        
                            </div>
                        
                            <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>
                        
                       
                   
          
                            <div class="card-body">
                                
                                            <div>
                                                @php
                                                    $bancos=['Banco Estado'=>'Banco Estado','Banco Santander'=>'Banco Santander','Banco de Chile'=>'Banco de Chile','Banco Falabella'=>'Banco Falabella','Banco BCI'=>'Banco BCI'];
                                                    $cuentas=['Cuenta Vista'=>'Cuenta Vista','Cuenta Corriente'=>'Cuenta Corriente','Cuenta Ahorro'=>'Cuenta Ahorro','Cuenta Rut'=>'Cuenta Rut'];
                                                @endphp
                                                {!! Form::open(['route'=>'vendedor.home.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                                            
                                                @csrf
                                                    
                                                <div class="max-w-full items-center">
                
                
                                                    <h1 class="text-xl pb-4 text-center">Formulario de Promotor RCH</h1>
                
                                                    <p class="text-center">Indique los datos del titular de la cuenta</p>
                
                                                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                                                        <div class="md: col-span-2 lg:col-span-2 ">
                                                            <div class="mb-4">
                                                                {!! Form::label('name', 'Nombre completo:') !!}
                                                                {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
                                
                                                                @error('name')
                                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('rut', 'Rut:') !!}
                                                                {!! Form::text('rut', null , ['class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}
                                
                                                                @error('rut')
                                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('fono', 'Fono:') !!}
                                                                {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('localidad', 'Localidad:') !!}
                                                                {!! Form::text('localidad', null , ['class' => 'form-input block w-full mt-1'.($errors->has('localidad')?' border-red-600':'')]) !!}
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('disciplina_id', 'Disciplina favorita:') !!}
                                                                {!! Form::select('disciplina_id', $disciplinas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                                            </div>
                                                            
                                                        
                                                        </div>
                                                    
                                                    </div>
                                                
                
                                                    <h1 class="text-xl pb-4 text-center">Datos Bancarios</h1>
                
                                                    <p class="text-center">Indique en qué cuenta desea recibir sus comisiones por productos vendidos</p>
                
                                                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                                                        <div class="md: col-span-2 lg:col-span-2 ">
                                                            
                                                            <div class="mb-4">
                                                                {!! Form::label('banco', 'Banco:') !!}
                                                                {!! Form::select('banco', $bancos, null , ['class'=>'form-input block w-full mt-1']) !!}
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('tipo_cuenta', 'Tipo de cuenta:') !!}
                                                                {!! Form::select('tipo_cuenta', $cuentas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                                            </div>
                                                            
                                                            <div class="mb-4">
                                                                {!! Form::label('nro_cuenta', 'Nro Cuenta*') !!}
                                                                {!! Form::text('nro_cuenta', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_cuenta')?' border-red-600':'')]) !!}
                                
                                                                @error('nro_cuenta')
                                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                                @enderror
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                    
                                                    </div>
                                                
                                                    
                                                </div>
                                                {!! Form::hidden('user_id',auth()->user()->id) !!}
                                            
                                                    <div class="flex justify-center">
                                                        {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                                                    </div>
                                                
                                                {!! Form::close() !!}
                                            </div>
                                            
                                    
            
                            
                                   
                            
                            
                        </div>
                    </div>
            
                </div>
            
               
            @endif
        @else
           
            {{-- comment
                @livewire('vendedor.catalogo-productos')
            --}}
        
        
            <div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
        
                <div class="card pb-8 ">
              
                        
                      @livewire('vendedor.public-show')
               
                    <div class="justify-between mt-8 bg-gray-200">
        
                        <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                        <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                    
                            <article>
                                <figure>
                                    <a href="https://www.instagram.com/reel/CVyzsrhpZE3/?utm_source=ig_web_copy_link" target="_blank">
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe2.png')}}" alt="">
                                    </a>
                                </figure>
                            
                            </article>
                            <div>
                                <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                                <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                    
                            </div>
        
        
                        </div>
                
                    </div>
                
                    <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>
                    
           
                        <div class="card-body">
                          
                                    
                                <h1 class="text-center 3xl font-bold">Para registrarte como vendedor debes <a href="{{ route('login') }}">INICIAR SESIÓN</a> en nuestra plataforma y podras rellenar el siguiente formulario </h1>
                                @php
                                    $bancos=['Banco Estado'=>'Banco Estado','Banco Santander'=>'Banco Santander','Banco de Chile'=>'Banco de Chile','Banco Falabella'=>'Banco Falabella','Banco BCI'=>'Banco BCI'];
                                    $cuentas=['Cuenta Vista'=>'Cuenta Vista','Cuenta Corriente'=>'Cuenta Corriente','Cuenta Ahorro'=>'Cuenta Ahorro','Cuenta Rut'=>'Cuenta Rut'];
                                @endphp
                                
                                
                                <h1 class="text-center py-2 font-bold">Una vez que hayas creado tu cuenta con nosotros podras registrarte como vendedor autorizado de RidersChilenos</h1>
                                <div class="flex justify-center mx-4 pb-20 mb-20">
                                    
                                    <form method="POST" action="{{ route('register') }}" class="w-full">
                                        @csrf
                            
                                        <div>
                                            <x-jet-label for="name" value="{{ __('Nombre') }}" />
                                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        </div>
                            
                                        <div class="mt-4">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                        </div>
                            
                                        <div class="mt-4">
                                            <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                        </div>
                            
                                        <div class="mt-4">
                                            <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>
                            
                                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                            <div class="mt-4">
                                                <x-jet-label for="terms">
                                                    <div class="flex items-center">
                                                        <x-jet-checkbox name="terms" id="terms"/>
                            
                                                        <div class="ml-2">
                                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                            ]) !!}
                                                        </div>
                                                    </div>
                                                </x-jet-label>
                                            </div>
                                        @endif
                            
                                        <div class="flex items-center justify-end mt-4">
                                            <h1 class="text-sm mr-2">Ya tienes una cuenta? </h1>
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-auto" href="{{ route('login') }}">
                                                {{ __('Ingresar') }}
                                            </a>
                            
                                            <x-jet-button class="ml-4">
                                                {{ __('Registrarme') }}
                                            </x-jet-button>
                                        </div>
                                    </form>
                                    
                                </div>
                         
                        
                        
                    </div>
                </div>
        
            </div>
            

        @endif

    </div>

    <div :class="{'block': base, 'hidden': ! base}" class="hidden">
        {{$slot}}
    </div>
</div>