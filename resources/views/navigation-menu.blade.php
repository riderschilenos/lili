@php
 $nav_links =[
     [
        'name'=>'Home',
        'route'=>route('home'),
        'active'=>request()->routeIs('home')
    ]
    /*,[   
        'name'=>'RCH-TV',
        'route'=>route('series.index'),
        'active'=>request()->routeIs('series.*')

    ]*/
    ,[   
        'name'=>'Eventos',
        'route'=>route('ticket.evento.index'),
        'active'=>request()->routeIs('ticket.evento.*')
    ] ,[   
        'name'=>'Pistas',
        'route'=>route('ticket.pistas.index'),
        'active'=>request()->routeIs('ticket.pistas*')
    ] /*
    ,[   
        'name'=>'División Usados',
        'route'=>route('garage.usados'),
        'active'=>request()->routeIs('usados.*')

    ]*/
    ,[   
        'name'=>'Servicios',
        'route'=>route('socio.index'),
        'active'=>request()->routeIs('socios.*')

    ],
    /*
    [   'name'=>'DATABASE',
        'route'=>route('garage.vehiculos.registerindex'),
        'active'=>request()->routeIs('garage.vehiculos.registerindex')

    ],*/
    [   
        'name'=>'Portal Vendedores',
        'route'=>route('vendedores.index'),
        'active'=>request()->routeIs('vendedor.*')

    ]
    ,[   
        'name'=>'Diseño',
        'route'=>route('admin.disenos.index'),
        'can'=>'Diseño',
        'active'=>request()->routeIs('admin.disenos.index')

    ]
    ,[   
        'name'=>'Producción',
        'route'=>route('admin.disenos.produccion'),
        'can'=>'Diseño',
        'active'=>request()->routeIs('admin.disenos.produccion')

    ]
   
    /*
    ,[   
        'name'=>'Tienda',
        'route'=>'#',
        'active'=>false

    ]*/
 ]   
@endphp

<nav x-data="{ open: false }" class="border-b border-gray-100" style="z-index: 20;">
    <!-- Primary Navigation Menu -->
    <div class="fixed sm:hidden top-0 bg-main-color w-full md:relative md:bg-white sm:pt-3" style="z-index: 20;">
        <div class="container mb-0 sm:mb-6" >
            <div class="bg-main-color md:hidden">
                <div class="fixed top-4 left-4 md:hidden">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <x-jet-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>
                </div>
                <div class="w-full text-white bg-main-color block md:hidden">
                    <div class="flex flex-col max-w-screen-xl pt-3 pb-4 md:py-0 px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                        <div class="flex flex-row items-center my-auto content-center justify-center">
                            <h1 class="text-2xl text-center font-bold my-2">RIDERS CHILENOS</h1>
                        </div>
                    </div>
                </div>
                <div class="fixed top-4 right-4 md:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <h1 class="text-center hidden">hola mundo</h1>

    <div class="hidden md:block top-0 bg-red-600 w-full md:relative md:bg-white sm:pt-3" style="z-index: 20;">
        <div class="container mb-0 sm:mb-6" >
            <div class="flex justify-between h-16">
                
                <div class="hidden sm:flex">
                    <!-- Logo -->
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-14 sm:flex">
                        @foreach ($nav_links as $nav_link)

                            @if ($nav_link['name']=='Diseño')
                                @can('Diseño')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endcan
                                
                            @elseif($nav_link['name']=='Producción')
                                @can('Diseño')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endcan
                            @elseif($nav_link['name']=='Eventos')     
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                            @else
                                <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                    {{ $nav_link['name'] }}
                                </x-jet-nav-link>
                            @endif
                                

                        @endforeach  

                        <a href="{{route('vendedores.index')}}" class="btn btn-danger h-10 my-auto">Tienda</a>
                        

                    </div>
                    
                </div>
                
                

                <div class="hidden sm:flex sm:items-center sm:ml-6 bg-white">
                    
                    @auth
                    
                        <!-- Teams Dropdown -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                {{ __('Team Settings') }}
                                            </x-jet-dropdown-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                    {{ __('Create New Team') }}
                                                </x-jet-dropdown-link>
                                            @endcan

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-jet-switchable-team :team="$team" />
                                            @endforeach
                                        </div>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        @endif

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative  bg-white">

                        
                                
                            
                            <x-jet-dropdown align="right" width="48" class="bg-white">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> <p class="mt-2 ml-1">{{ Auth::user()->name }}</p>
                                        </button>
                                        
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content" class="bg-white">
                                    <!-- Account Management -->
                                    @if(auth()->user()->socio)
                                        <x-jet-dropdown-link href="{{ route('socio.show', auth()->user()->socio) }}" class="bg-white">
                                            {{ __('Mi Perfil') }}
                                        </x-jet-dropdown-link>
                                    @endif
                                    <x-jet-dropdown-link href="{{ route('socio.create') }}">
                                        {{ __('Suscripción') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('garage.vehiculos.index') }}">
                                        {{ __('Mis vehiculos') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Configuración y Privacidad') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Configuración') }}
                                    </x-jet-dropdown-link>

                                    @can('Ver dashboard')
                                        <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                            {{ __('Admin') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Leer series')
                                        <x-jet-dropdown-link href="{{ route('filmmaker.series.index') }}">
                                            {{ __('Creador de Contenido') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Crear evento')
                                        <x-jet-dropdown-link href="{{ route('organizador.eventos.index') }}">
                                            {{ __('Organizador') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Salir') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>

                        
                            

                        </div>

                    @else

                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registro</a>
                    
                    @endauth

                    


                </div>

            </div>
        </div>
    </div>
    <div class="fixed sm:hidden bottom-0 bg-red-600 w-full md:relative md:bg-white sm:pt-3" style="z-index: 20;">
        <div class="container mb-0 sm:mb-6" >
            <div class="flex justify-between h-16">
                <div class="hidden sm:flex">
                    <!-- Logo -->
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-14 sm:flex">
                        @foreach ($nav_links as $nav_link)
                                
                            @if ($nav_link['name']=='Diseño')
                                @can('Diseño')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endcan
                                
                            @elseif($nav_link['name']=='Producción')
                                @can('Diseño')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endcan
                            @elseif($nav_link['name']=='Eventos')
                              
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                              
                            @else
                                <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                    {{ $nav_link['name'] }}
                                </x-jet-nav-link>
                            @endif
                                

                        @endforeach  
                        

                    </div>
                    
                </div>
                
                

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    
                    @auth
                    
                        <!-- Teams Dropdown -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                {{ __('Team Settings') }}
                                            </x-jet-dropdown-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                    {{ __('Create New Team') }}
                                                </x-jet-dropdown-link>
                                            @endcan

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-jet-switchable-team :team="$team" />
                                            @endforeach
                                        </div>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        @endif

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">

                        
                                
                            
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> <p class="mt-2 ml-1">{{ Auth::user()->name }}</p>
                                        </button>
                                        
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    @if(auth()->user()->socio)
                                        <x-jet-dropdown-link href="{{ route('socio.show', auth()->user()->socio) }}">
                                            {{ __('Mi Perfil') }}
                                        </x-jet-dropdown-link>
                                    @endif
                                    <x-jet-dropdown-link href="{{ route('socio.create') }}">
                                        {{ __('Suscripción') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('garage.vehiculos.index') }}">
                                        {{ __('Mis vehiculos') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Configuración y Privacidad') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Configuración') }}
                                    </x-jet-dropdown-link>

                                    @can('Ver dashboard')
                                        <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                            {{ __('Admin') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Leer series')
                                        <x-jet-dropdown-link href="{{ route('filmmaker.series.index') }}">
                                            {{ __('Creador de Contenido') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Crear evento')
                                        <x-jet-dropdown-link href="{{ route('organizador.eventos.index') }}">
                                            {{ __('Organizador') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Salir') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>

                        
                            

                        </div>

                    @else

                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registro</a>
                    
                    @endauth

                    


                </div>







                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    
                        <button @click="home = true; socio = false; registro = false; user = false; vendedor = false; base = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </button>
                      
                </div>

                <!-- Search -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="socio = true; home = false; registro = false; user = false; vendedor = false; base = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            {{-- comment <a href="{{ route('socio.index') }}"> --}}   
                                    
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        
                    </button>
                </div>
                <!-- Database -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <a href="{{route('pagosqr.cliente')}}">
                        <button @click="registro = true; home = false; socio = false; user = false; vendedor = false; base = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">          
                            
                            <div :class="{'flex':! registro, 'hidden': registro}" class="hidden sm:hidden">
                                <svg version="1.1"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 122.6 122.9" class="w-8 h-w">
                                <style type="text/css">
                                    .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                                </style>
                                <path class="st0" d="M26.7,26.8h25.2v25.1H26.7V26.8z M35.7,0H23.1c-3,0-6,0.6-8.8,1.8c-2.8,1.2-5.3,2.9-7.5,5l0,0
                                    c-2.1,2.1-3.8,4.7-5,7.5C0.6,17,0,20,0,23.1v15.6h10.2V23.1c0-1.7,0.4-3.3,1-4.9c0.6-1.6,1.6-3,2.8-4.2l0,0c2.4-2.4,5.7-3.8,9.1-3.8
                                    h12.6V0z M99.5,0h-8.2v10.2h8.2c1.7,0,3.3,0.4,4.9,1c1.6,0.6,3,1.6,4.2,2.8l0.3,0.4l0,0c1,1.1,1.9,2.4,2.4,3.8c0.7,1.5,1,3.2,1,4.9
                                    v15.6h10.2V23.1c0-5.9-2.3-11.7-6.4-15.9l0,0l-0.4-0.4c-2.1-2.1-4.7-3.8-7.5-5C105.6,0.6,102.6,0,99.5,0z M122.6,99.8V82.5h-10.2
                                    v17.3c0,1.7-0.3,3.3-1,4.9c-0.7,1.6-1.6,3-2.8,4.2c-2.4,2.4-5.7,3.8-9.1,3.8h-8.2v10.2h8.2c6.1,0,12-2.4,16.3-6.8
                                    c2.1-2.1,3.8-4.7,5-7.5C122,105.8,122.6,102.8,122.6,99.8L122.6,99.8z M23.1,122.9h12.6v-10.2H23.1c-3.4,0-6.7-1.4-9.1-3.8l-0.3-0.2
                                    c-1.1-1.2-2-2.6-2.6-4.1c-0.6-1.5-0.9-3.1-0.9-4.7V82.5H0v17.3c0,2.9,0.6,5.8,1.7,8.6c1.1,2.7,2.7,5.3,4.8,7.4l0.3,0.3
                                    c2.1,2.1,4.7,3.8,7.5,5C17.1,122.3,20,122.9,23.1,122.9L23.1,122.9z M89.6,89.8H96v6.3h-6.4V89.8z M77.2,89.8h6.4v6H70.8V83.5H77
                                    v-6.2h6.3V64.8h6.5v6.1h6.1v6.3h-6.1v6.3H77.2L77.2,89.8L77.2,89.8z M58.1,77.1h6.2v-6.3h-6v-6.3h6v-6.3h-6.1v6.3h-6.4v-6.3h6.3
                                    V39.3h6.4v18.8h6.2v6.3h6.1v-6.3h6.4v6.3h-6.1v6.3h-6.4v12.5h-6.2v12.6h-6.4V77.1z M89.5,58.1h6.4v6.3h-6.4
                                    C89.5,64.5,89.5,58.1,89.5,58.1z M39.2,58.1h6.4v6.3h-6.4C39.2,64.5,39.2,58.1,39.2,58.1z M26.7,58.1h6.4v6.3h-6.4
                                    C26.7,64.5,26.7,58.1,26.7,58.1z M58.1,26.8h6.4v6.3h-6.4V26.8z M26.6,70.9h25.2V96H26.6V70.9z M32.7,77h13v12.9h-13V77z M70.7,26.8
                                    h25.2v25.1H70.7L70.7,26.8L70.7,26.8z M76.8,32.9h13v12.9h-13V32.9L76.8,32.9z M32.8,32.9h13v12.9h-13V32.9L32.8,32.9z"/>
                                </svg>

                            </div>
                            <div :class="{'flex': registro, 'hidden': ! registro}" class="hidden sm:hidden">
                                <svg version="1.1"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 122.6 122.9" class="w-8 h-w">
                                    <style type="text/css">
                                        .st1{fill-rule:evenodd;clip-rule:evenodd;fill:#A8A8A8;}
                                    </style>
                                    <path class="st1" d="M26.7,26.8h25.2v25.1H26.7V26.8z M35.7,0H23.1c-3,0-6,0.6-8.8,1.8c-2.8,1.2-5.3,2.9-7.5,5l0,0
                                        c-2.1,2.1-3.8,4.7-5,7.5C0.6,17,0,20,0,23.1v15.6h10.2V23.1c0-1.7,0.4-3.3,1-4.9c0.6-1.6,1.6-3,2.8-4.2l0,0c2.4-2.4,5.7-3.8,9.1-3.8
                                        h12.6V0z M99.5,0h-8.2v10.2h8.2c1.7,0,3.3,0.4,4.9,1c1.6,0.6,3,1.6,4.2,2.8l0.3,0.4l0,0c1,1.1,1.9,2.4,2.4,3.8c0.7,1.5,1,3.2,1,4.9
                                        v15.6h10.2V23.1c0-5.9-2.3-11.7-6.4-15.9l0,0l-0.4-0.4c-2.1-2.1-4.7-3.8-7.5-5C105.6,0.6,102.6,0,99.5,0z M122.6,99.8V82.5h-10.2
                                        v17.3c0,1.7-0.3,3.3-1,4.9c-0.7,1.6-1.6,3-2.8,4.2c-2.4,2.4-5.7,3.8-9.1,3.8h-8.2v10.2h8.2c6.1,0,12-2.4,16.3-6.8
                                        c2.1-2.1,3.8-4.7,5-7.5C122,105.8,122.6,102.8,122.6,99.8L122.6,99.8z M23.1,122.9h12.6v-10.2H23.1c-3.4,0-6.7-1.4-9.1-3.8l-0.3-0.2
                                        c-1.1-1.2-2-2.6-2.6-4.1c-0.6-1.5-0.9-3.1-0.9-4.7V82.5H0v17.3c0,2.9,0.6,5.8,1.7,8.6c1.1,2.7,2.7,5.3,4.8,7.4l0.3,0.3
                                        c2.1,2.1,4.7,3.8,7.5,5C17.1,122.3,20,122.9,23.1,122.9L23.1,122.9z M89.6,89.8H96v6.3h-6.4V89.8z M77.2,89.8h6.4v6H70.8V83.5H77
                                        v-6.2h6.3V64.8h6.5v6.1h6.1v6.3h-6.1v6.3H77.2L77.2,89.8L77.2,89.8z M58.1,77.1h6.2v-6.3h-6v-6.3h6v-6.3h-6.1v6.3h-6.4v-6.3h6.3
                                        V39.3h6.4v18.8h6.2v6.3h6.1v-6.3h6.4v6.3h-6.1v6.3h-6.4v12.5h-6.2v12.6h-6.4V77.1z M89.5,58.1h6.4v6.3h-6.4
                                        C89.5,64.5,89.5,58.1,89.5,58.1z M39.2,58.1h6.4v6.3h-6.4C39.2,64.5,39.2,58.1,39.2,58.1z M26.7,58.1h6.4v6.3h-6.4
                                        C26.7,64.5,26.7,58.1,26.7,58.1z M58.1,26.8h6.4v6.3h-6.4V26.8z M26.6,70.9h25.2V96H26.6V70.9z M32.7,77h13v12.9h-13V77z M70.7,26.8
                                        h25.2v25.1H70.7L70.7,26.8L70.7,26.8z M76.8,32.9h13v12.9h-13V32.9L76.8,32.9z M32.8,32.9h13v12.9h-13V32.9L32.8,32.9z"/>
                                    </svg>
                            </div>        
                                
                        </button>
                    </a>
                </div>
                <!-- Portal Vendedores -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="vendedor = true; home = false; socio = false; user = false; registro = false; base = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        
                    </button>
                </div>
                <!-- Perfil -->
                
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                @if(auth()->user())
                                    @if(auth()->user()->socio)
                                        <svg @click="user = true; home = false; socio = false; registro = false; vendedor = false; base = false" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    @else
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <a href="{{route('socio.create')}}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></a>
                                        </svg>
                                    @endif
                                @else
                                    <svg @click="user = true; home = false; socio = false; registro = false; vendedor = false; base = false"  class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                @endif
                            </button>
                        </div>

                       
                    
                    
            </div>
        </div>
    </div>

    

    <!-- Responsive Navigation Menu -->
    
    <h1 class="text-center text-xs font-bold my-1 hidden md:block">Obten tu suscripcion de RidersChilenos</h1>
    <div class="flex justify-end z-20" style="z-index: 20;">
        <div :class="{'fixed': open, 'hidden': ! open}" class="hidden md:hidden">
            <div class="space-y-1 bg-white z-20" style="z-index: 20;">
                <x-jet-responsive-nav-link href="{{route('vendedores.index')}}" :active="$nav_link['active']">
                    Tienda
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{route('vendedores.index')}}" :active="$nav_link['active']">
                    Tienda
                </x-jet-responsive-nav-link>
                
                @foreach ($nav_links as $nav_link)

                    @if ($nav_link['name']=='Diseño')
                        @can('Diseño')
                           {{-- comment
                            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-jet-responsive-nav-link>
                             --}}
                        @endcan

                    @elseif($nav_link['name']=='Producción')
                        @can('Diseño')
                        {{-- comment
                            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-jet-responsive-nav-link> --}}
                        @endcan

                    @elseif($nav_link['name']=='Eventos')
                        
                            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-jet-responsive-nav-link>
                
                        
                    @else
                        <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endif
                


                @endforeach
                
                    

            </div>

            <!-- Responsive Settings Options -->
            
            @auth        
            
                <div class="pt-4 pb-1 border-t border-gray-200 bg-white">
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="flex-shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif

                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1  bg-white">
                        <!-- Account Management --> 
                        @if(auth()->user()->socio)
                            <x-jet-responsive-nav-link href="{{ route('socio.show', auth()->user()->socio) }}" :active="request()->routeIs('socio.show')">
                                {{ __('Mi Perfil') }}
                            </x-jet-responsive-nav-link>
                        @endif
                        <x-jet-responsive-nav-link href="{{ route('socio.create') }}" :active="request()->routeIs('socio.create')">
                            {{ __('Suscripción') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('garage.vehiculos.index') }}" :active="request()->routeIs('garage.vehiculos.index')">
                            {{ __('Mis vehiculos') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Configuración') }}
                        </x-jet-responsive-nav-link>
                        @can('Ver dashboard')
                            <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                                {{ __('Admin') }}
                            </x-jet-responsive-nav-link>
                        @endcan
                        @can('Leer series')
                            <x-jet-responsive-nav-link href="{{ route('filmmaker.series.index') }}" :active="request()->routeIs('filmmaker.series.index')">
                                {{ __('Creador de Contenido') }}
                            </x-jet-responsive-nav-link>
                        @endcan
                        

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-jet-responsive-nav-link>
                        </form>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                {{ __('Team Settings') }}
                            </x-jet-responsive-nav-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                    {{ __('Create New Team') }}
                                </x-jet-responsive-nav-link>
                            @endcan

                            <div class="border-t border-gray-200"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                            @endforeach
                        @endif
                    </div>
                </div>
                
            

            @else
            <div class="py-1 border-t border-gray-200 bg-white">
                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                Ingresar
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                Registro
                </x-jet-responsive-nav-link>

            </div>
            @endauth
            
        </div>
    </div>
    
</nav>
