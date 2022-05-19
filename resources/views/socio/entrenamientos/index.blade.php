<x-app-layout>
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
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



    <div class="bg-gray-100">
    <div class="w-full text-white bg-main-color">
            <div x-data="{ open: false }"
                class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="{{route('socio.index')}}"
                        class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline cursor-pointer"><i class="fas fa-arrow-circle-left text-white-800"></i> Seguir Navegando</a>
                   
                </div>
            </div>
        </div>
        <!-- End of Navbar -->

        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    @switch($socio->status)
                                                @case(1)
                                                <div class="bg-white p-3 border-t-4 border-green-500">
                                                    @break
                                                @case(2)
                                                <div class="bg-white p-3 border-t-4 border-red-400">
                                                    @break
                                                @default
                                                    
                                        @endswitch
                    
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto object-cover"
                                src="{{ $socio->user->profile_photo_url }}"
                                alt="">
                        </div>
                        <div class="flex">
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ '@'.$socio->slug }}</h1>
                        @can('perfil_propio', $socio)
                            <h1 class="text-gray-400 font-bold text-xs leading-8 my-1 ml-auto"><a href="{{ route('profile.show') }}">Editar Foto</a></h1>
                        @endcan
                        </div>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Auspiciadores:</h3>
                            <div class="grid grid-cols-3">
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
                        <a href="{{ route('socio.create') }}">
                            <ul
                                class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Suscripción</span>
                                        @switch($socio->status)
                                                @case(1)
                                                    <span class="ml-auto"><span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Vigente</span></span>
                                                    @break
                                                @case(2)
                                                    <span class="ml-auto"><span class="bg-red-500 py-1 px-2 rounded text-white text-sm">INACTIVO</span></span>
                                                    @break
                                                @default
                                                    
                                        @endswitch
                                        
                                </li>

                                @if($socio->suscripcions->count())

                                    
                                <li class="flex items-center py-3">
                                    <span>Fecha Vencimiento</span>
                                    <span class="ml-auto">{{date('d', strtotime($socio->suscripcions->first()->end_date)).' de '.$meses[date('n', strtotime($socio->suscripcions->first()->end_date))-1].' del '.date('Y', strtotime($socio->suscripcions->first()->end_date))}}</span>
                                </li>

                                @endif
                            </ul>
                        </a>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    
                    <!-- End of friends card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <p class="tracking-wide">Ficha Deportiva

                                @can('perfil_propio', $socio)

                                
                                    <a href="{{route('socio.edit',$socio)}}"><h5 class="text-blue-600 font-bold text-sm cursor-pointer">(Editar)</h5></a>
                                
                                @endcan
                                
                                   </p>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Nombre</div>
                                    <div class="px-4 py-2">{{ $socio->name." ".$socio->second_name }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Apellido</div>
                                    <div class="px-4 py-2">{{ $socio->last_name }}</div>
                                </div>
                                @if($socio->fono)
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Nro. Contacto</div>
                                        <div class="px-4 py-2">{{ $socio->fono }}</div>
                                    </div>
                                @endif
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Localidad</div>
                                        @if($socio->direccion)
                                            <div class="px-4 py-2">{{$socio->direccion->comuna}}, {{$socio->direccion->region}}</div>
                                        @endif
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="mailto:jane@example.com">{{$socio->user->email}}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Fecha de Nacimiento</div>
                                    <div class="px-4 py-2">{{date('d-m-Y', strtotime($socio->born_date))}}</div>
                                </div>
                            </div>
                        </div>
                        <button
                            class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Ver todo</button>
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    <!-- garage and movie -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
 <!-- 
                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div class="bg-white p-3 hover:shadow">
                                <div class="items-center flex space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                    <span class="text-red-500">
                                        <i class="fas fa-car text-white-800"></i>
                                    </span>
                                    <span>Mi Garage</span>
                                       
                                                    @can('perfil_propio', $socio)
                                                    <a href="{{route('garage.vehiculo.create')}}"><span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Inscribir Vehiculo)</span></a>
                                                    @endcan
                                                
                                    
                                </div>
                                
                                <div class="grid grid-cols-2">

                                    @if ($socio->user->vehiculos)
                                        
                                    
                                        @foreach ($socio->user->vehiculos as $vehiculo)
                                            @if($vehiculo->status==5 || $vehiculo->status==6)
                                            <div class="text-center my-2">
                                                <a href="{{route('garage.vehiculo.show', $vehiculo)}}" class="text-main-color">
                                                    <img class="h-24 w-34 mx-auto"
                                                    src="{{Storage::url($vehiculo->image->first()->url)}}"
                                                    alt="">
                                                    <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                                                        <h1 class="text-md">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
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
                                    <span>MovieCollection</span>
                                </div>
                                <div class="grid grid-cols-4 gap-4">
                                 
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
                        </div>
                       End of Experience and education grid -->
                    </div>

                    <div class="my-4">
                    
                    <div class="bg-white p-3 shadow-sm rounded-sm">
{{-- comment 
                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div>
                                <div class="items-center flex space-x-3 font-semibold text-gray-900 text-xl leading-8 mb-3">
                                    <span class="text-red-500">
                                        <i class="fas fa-car text-white-800"></i>
                                    </span>
                                    <span>Mi Entrenamiento</span>
                                       
                                                    @can('perfil_propio', $socio)
                                                    <a href="{{route('garage.vehiculo.create')}}"><span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Ver más)</span></a>
                                                    @endcan
                                                
                                    
                                </div>
                                <ul class="list-inside space-y-2">
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
                            </div>
                        </div>
                        --}}
                    </div> 

                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>