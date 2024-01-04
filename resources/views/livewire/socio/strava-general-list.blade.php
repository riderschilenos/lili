<div class="flex flex-wrap -mx-3 mb-5">
    <div class="container pb-2">
        <div class="card" x-data=(orden:true)>
            <div class="bg-white px-3">
                
                <div class="bg-white w-full max-w-5xl mx-auto px-2 lg:px-2 py-2 my-2 shadow-md rounded-md flex flex-col lg:flex-row justify-center items-center cursor-pointer">
                    <div class="w-full lg:w-1/2 lg:pr-8 lg:border-r-2 lg:border-slate-300 flex justify-center items-center my-auto">
                    
                        <div class="hidden md:flex justify-center my-auto items-center w-full max-w-sm">
                            @livewire('socio.strava-count-total')
                        </div>
                    
                
                    </div>
                    <div class="w-full lg:w-1/2 lg:pl-8">
                        @if (auth()->user())
                            @can('perfil_propio', auth()->user()->socio)
                                <div class="md:hidden">
                                    @livewire('socio.strava-count-total')
                                </div>
                                    @if (auth()->user()->AtletaStrava)
                                        <div class="block rounded items-center ">
                                                
                                            <div class="flex justify-center my-auto items-center w-full">
                                               
                                                        @livewire('socio.strava-lugar-personal')
                                                  
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
                        @else
                            
                            <div class="hidden md:flex justify-center ">
                                <div class="bg-white max-w-4xl px-6 pt-2 mb-4rounded-xl">
                                    <div class="items-center">
                                       
                              
                                        <h1 class="text-center my-2 font-bold">¡Súmate al Rankin!</h1>
                                        <h1 class="text-center my-2 text-md">Crea Tu Perfil Hoy Mismo!</h1>
                                    </div>
                                    <div class="ml-4">
                                        <div class="flex justify-center mt-2 ">
            
                                            <a href="https://riderschilenos.cl/login-google">
                                                <button class="flex btn bg-blue-500 text-white w-full items-center justify-items-center mr-2 mt-2"><svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>Ingresar Con Google<div></div></button>
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
                            </div>
                            <div class="md:hidden">
                                @livewire('socio.strava-count-total')
                            </div>
                        @endif

               
                    </div>
                
                
                </div>
              
              
            <x-table-responsive>
                    
        
                @if ($atletas_stravas->count())
        
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            RIDERS
                            </th>
                            <th scope="col" class="px-6 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                KMS<br>
                                Semana
                            </th>
                            <th scope="col" class="px-6 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                KMS<br>
                                Total
                            </th>
                            <th scope="col" class="relative px-6 py-1">
                            <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php
                                $lugar=1;
                            @endphp
                                @foreach ($atletas_stravas7dias as $user)   
                                        <tr >
                                            <td class="px-3 py-4 whitespace-nowrap">
                                                <a href="{{route('socio.show',$user->socio)}}">
                                                <div class="flex items-center">
                                                    <div>
                                                        <h1 class="mr-4 font-bold text-gray-400">
                                                            {{$lugar}}°
                                                        </h1>
                                                    </div>
                                                    @php
                                                        $lugar+=1;
                                                        
                                                    // Fecha de nacimiento del usuario (suponiendo que está almacenada en $user->socio->borndate)
                                                    $borndate = strtotime($user->socio->born_date);

                                                    // Calcula la diferencia en segundos
                                                    $diferencia_segundos = strtotime($now) - $borndate;
                                                    $diferencia_anios = floor($diferencia_segundos / (365 * 24 * 60 * 60));

                                                    @endphp
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                            
                                                        @if (str_contains($user->profile_photo_url,'https://ui-'))
                                                            <img class="h-11 w-11 object-cover object-center rounded-full" src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg" alt=""  />
                                                        @else
                                                            <img class="h-11 w-11 object-cover object-center rounded-full" src="{{$user->profile_photo_url }}" alt=""  />
                                                        @endif
                                                        
                                                            
                                                        
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="flex sm:hidden  text-sm text-gray-900">
                                                            {{Str::limit($user->name,15)}}
                                                        </div>
                                                        <div class="hidden sm:flex  text-sm text-gray-900">
                                                            {{Str::limit($user->name,40)}}
                                                        </div>
                                                        <div class="text-sm text-gray-500 flex justify-start">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 mr-2">
                                                            {{$user->socio->disciplina->name}}
                                                            </span>
                                                            {{$diferencia_anios}} Años
                                                        
                                                        </div>
                                                        @if(!is_null($user->socio->direccion))
                                                            <div class="text-xs flex items-center mt-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 mx-1">
                                                                    <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                                                </svg>
                                                                
                                                                
                                                                {{$user->socio->direccion->comuna." ".Str::limit($user->socio->direccion->region,18)}} 
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @can('Super admin')
                                                        <div class="ml-auto">
                                                            {!! Form::open(['route'=>['atleta.sync',$user->atletaStrava] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'POST']) !!}

                                                            
                                                            {!! Form::submit('Sincronizar actividad', ['class'=>'link-button text-center mt-6 text-xs mx-2 text-blue-600 cursor-pointer']) !!}
                                                                
                                                            {!! Form::close() !!}
                                                            id:{{$user->atletaStrava->id}}
                                                        </div>
                                                    @endcan
                                                </div>
                                                </a>
                                            </td>
                                            @php
                                                $total=0;
                                                $week=0;
                                            @endphp
                                                @if ($user->activities)
                                                    @foreach ($user->activities as $activitie)
                                                    @php
                                                        $date1 = strtotime($activitie->start_date_local);
                                                        $date2 = strtotime($now);

                                                        // Calcula la diferencia en segundos entre las dos fechas
                                                        $difference = $date2 - $date1;

                                                        // Convierte la diferencia de segundos a días
                                                        $daysDifference = floor($difference / (60 * 60 * 24));
                                                    
                                                    @endphp
                                                            @php
                                                                    $total+=floatval($activitie->distance);
                                                                    if ($daysDifference < 7) {
                                                                        $week+=floatval($activitie->distance);
                                                                    }
                                                            @endphp
                                                    
                                                    @endforeach
                                                @endif
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"> 
                                                        <div class="text-sm text-gray-900 text-center font-bold mt-2">  {{$week}} Kms </div>
                                                    
                                                            <span class="hidden text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-danger bg-danger-light rounded-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                                                </svg> 2.7% </span>
                                                </div>
                                            
                                            </td>
                                        
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="hidden text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                    </svg> 6.5% </span>   
                                                <div class="text-sm text-gray-900 text-center font-bold mt-2"> {{$total}} Kms </div>
                                                
                                            </td>
            
                                        
            
                                            
                                            
            
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Ver Perfil</a>
                                            
                                            </td>
                                        </tr>
                                @endforeach
                                @can('Super admin')
                                    <tr class="hidden">
                                        <td> Hola mundo</td>
                                    </tr>
                                @endcan
                                @foreach ($atletas_stravas7dias2 as $user)   
                                        <tr >
                                            <td class="px-3 py-4 whitespace-nowrap">
                                                <a href="{{route('socio.show',$user->socio)}}">
                                                <div class="flex items-center">
                                                    <div>
                                                        <h1 class="mr-4 font-bold text-gray-400">
                                                            {{($lugar)}}°
                                                        </h1>
                                                    </div>
                                                    @php
                                                        $lugar+=1;
                                                             
                                                    // Fecha de nacimiento del usuario (suponiendo que está almacenada en $user->socio->borndate)
                                                    $borndate = strtotime($user->socio->born_date);

                                                    // Calcula la diferencia en segundos
                                                    $diferencia_segundos = strtotime($now) - $borndate;
                                                    $diferencia_anios = floor($diferencia_segundos / (365 * 24 * 60 * 60));

                                                    @endphp
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                     
                                                        @if (str_contains($user->profile_photo_url,'https://ui-'))
                                                            <img class="h-11 w-11 object-cover object-center rounded-full" src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg" alt=""  />
                                                        @else
                                                            <img class="h-11 w-11 object-cover object-center rounded-full" src="{{$user->profile_photo_url }}" alt=""  />
                                                        @endif
                                                        
                                                            
                                                        
                                                    </div>
                                                  
                                                    <div class="ml-4">
                                                        <div class="flex sm:hidden  text-sm text-gray-900">
                                                            {{Str::limit($user->name,15)}}
                                                        </div>
                                                        <div class="hidden sm:flex  text-sm text-gray-900">
                                                            {{Str::limit($user->name,40)}}
                                                        </div>
                                                        <div class="text-sm text-gray-500 flex justify-start">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 mr-2">
                                                            {{$user->socio->disciplina->name}}
                                                            </span>
                                                            {{$diferencia_anios}} Años
                                                        </div>
                                                        @if(!is_null($user->socio->direccion))
                                                            <div class="text-xs flex items-center mt-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 mx-1">
                                                                    <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                                                </svg>
                                                                
                                                                
                                                                {{$user->socio->direccion->comuna." ".Str::limit($user->socio->direccion->region,18)}} 
                                                            </div>
                                                        @endif
                                                    </div>

                                                    @can('Super admin')
                                                        <div class="ml-auto">
                                                            {!! Form::open(['route'=>['atleta.sync',$user->atletaStrava] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'POST']) !!}

                                                            
                                                            {!! Form::submit('Sincronizar actividad', ['class'=>'link-button text-center mt-6 text-xs mx-2 text-blue-600 cursor-pointer']) !!}
                                                                
                                                            {!! Form::close() !!}
                                                            id:{{$user->atletaStrava->id}}
                                                        </div>
                                                    @endcan
                                                </div>
                                                </a>
                                            </td>
                                            @php
                                                $total=0;
                                                $week=0;
                                            @endphp
                                                @if ($user->activities)
                                                    @foreach ($user->activities as $activitie)
                                                    @php
                                                        $date1 = strtotime($activitie->start_date_local);
                                                        $date2 = strtotime($now);

                                                        // Calcula la diferencia en segundos entre las dos fechas
                                                        $difference = $date2 - $date1;

                                                        // Convierte la diferencia de segundos a días
                                                        $daysDifference = floor($difference / (60 * 60 * 24));
                                                    
                                                    @endphp
                                                            @php
                                                                    $total+=floatval($activitie->distance);
                                                                    if ($daysDifference < 7) {
                                                                        $week+=floatval($activitie->distance);
                                                                    }
                                                            @endphp
                                                    
                                                    @endforeach
                                                @endif
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"> 
                                                        <div class="text-sm text-gray-900 text-center font-bold mt-2">  {{$week}} Kms </div>
                                                    
                                                            <span class="hidden text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-danger bg-danger-light rounded-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                                                </svg> 2.7% </span>
                                                </div>
                                            
                                            </td>
                                        
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="hidden text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                    </svg> 6.5% </span>   
                                                <div class="text-sm text-gray-900 text-center font-bold mt-2"> {{$total}} Kms </div>
                                                
                                            </td>
            
                                        
            
                                            
                                            
            
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Ver Perfil</a>
                                            
                                            </td>
                                        </tr>
                                @endforeach
                          
                        </tbody>
                    </table>
                    
                @else
                    <div class="px-6 py-4">
                        No hay ningun registro
                    </div>
                @endif 
        
                <div class="px-6 py-4">
                    {{$atletas_stravas->links()}}
                </div>
            </x-table-responsive>
              
            
            </div>
        </div>
    
    </div>



<div class="flex flex-wrap -mx-3 mb-5">
  <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
    <p class="text-sm text-slate-500 py-1"> Tailwind CSS Component from <a href="https://www.loopple.com/theme/riva-dashboard-tailwind?ref=tailwindcomponents" class="text-slate-700 hover:text-slate-900" target="_blank">Riva Dashboard</a> by <a href="https://www.loopple.com" class="text-slate-700 hover:text-slate-900" target="_blank">Loopple Builder</a>. </p>
  </div>
</div>