@php
 $nav_links =[
     [
        'name'=>'Home',
        'route'=>route('home'),
        'active'=>request()->routeIs('home')
    ]
    ,[   
        'name'=>'RCH-TV',
        'route'=>route('series.index'),
        'active'=>request()->routeIs('series.*')

    ] 
    ,[   
        'name'=>'División Usados',
        'route'=>route('garage.usados'),
        'active'=>request()->routeIs('usados.*')

    ]
    ,[   
        'name'=>'RIDERS',
        'route'=>route('socio.index'),
        'active'=>request()->routeIs('socios.*')

    ]
    ,[   
        'name'=>'DATABASE',
        'route'=>route('garage.vehiculos.registerindex'),
        'active'=>request()->routeIs('garage.vehiculos.registerindex')

    ],[   
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

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="fixed top-4 left-4 md:hidden">
        <div class="flex-shrink-0 flex items-center">
            <a href="{{ route('home') }}">
                <x-jet-application-mark class="block h-9 w-auto" />
            </a>
        </div>
    </div>
    <div class="fixed bottom-0 bg-red-600 w-full md:relative md:bg-white">
        <div class="container">
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
                                        {{ __('Perfil Rider') }}
                                    </x-jet-dropdown-link>
                                @endif
                                <x-jet-dropdown-link href="{{ route('socio.create') }}">
                                    {{ __('Suscripción RCH') }}
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
                                        {{ __('Filmmaker') }}
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
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Search -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <a href="{{ route('socio.index') }}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></a>
                            </svg>
                        
                    </button>
                </div>
                <!-- Database -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <a href="{{ route('garage.vehiculos.registerindex') }}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></a>
                            </svg>
                        
                    </button>
                </div>
                <!-- Portal Vendedores -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <a href="{{ route('vendedores.index') }}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></a>
                            </svg>
                        
                    </button>
                </div>
                <!-- Perfil -->
                
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                @if(auth()->user())
                                    @if(auth()->user()->socio)
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <a href="{{ route('socio.show', auth()->user()->socio) }}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></a>
                                        </svg>
                                    @else
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <a href="{{route('socio.create')}}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></a>
                                        </svg>
                                    @endif
                                @else
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <a href="{{ route('login') }}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></a>
                                    </svg>
                                @endif
                            </button>
                        </div>

                       
                    
                    
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    
        
  
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-16 pb-3 space-y-1">
            
            @foreach ($nav_links as $nav_link)

                @if ($nav_link['name']=='Diseño')
                    @can('Diseño')
                        <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endcan

                @elseif($nav_link['name']=='Producción')
                    @can('Diseño')
                        <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endcan
                    
                @else
                    <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                        {{ $nav_link['name'] }}
                    </x-jet-responsive-nav-link>
                @endif
            


            @endforeach
            
                

        </div>

        <!-- Responsive Settings Options -->
        
        @auth        
        
        <div class="pt-4 pb-1 border-t border-gray-200">
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

            <div class="mt-3 space-y-1">
                <!-- Account Management --> 
                @if(auth()->user()->socio)
                    <x-jet-responsive-nav-link href="{{ route('socio.show', auth()->user()->socio) }}" :active="request()->routeIs('socio.show')">
                        {{ __('Perfil Rider') }}
                    </x-jet-responsive-nav-link>
                @endif
                <x-jet-responsive-nav-link href="{{ route('socio.create') }}" :active="request()->routeIs('socio.create')">
                    {{ __('Suscripción Rider') }}
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
                        {{ __('Filmmaker') }}
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
        <div class="py-1 border-t border-gray-200">
            <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
            Ingresar
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
            Registro
            </x-jet-responsive-nav-link>

        </div>
        @endauth

    </div>

</nav>
