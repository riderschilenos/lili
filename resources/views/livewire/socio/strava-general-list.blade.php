<div class="flex flex-wrap -mx-3 mb-5">
    <div class="container py-2">
        <div class="card">
            <div class="bg-white px-3 py-4">
                
                @livewire('socio.strava-count-total')
              
                
                
            <x-table-responsive>
                    
        
                @if ($atletas_stravas->count())
        
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            RIDERS
                            </th>
                            <th scope="col" class="px-6 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                KMS<br>
                                Total
                            </th>
                            <th scope="col" class="px-6 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                KMS<br>
                                Semana
                            </th>
                        
                            <th scope="col" class="relative px-6 py-1">
                            <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
        
                            @foreach ($atletas_stravas as $user)
        
                                    
                                    <tr >
                                        <td class="px-3 py-4 whitespace-nowrap">
                                            <a href="{{route('socio.show',$user->socio)}}">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                        
                                                        <img class="h-11 w-11 object-cover object-center rounded-full" src="{{$user->profile_photo_url }}" alt=""  />
                                                    
                                                        
                                                    
                                                </div>
                                                <div class="ml-4">
                                                    <div class="flex sm:hidden  text-sm text-gray-900">
                                                        {{Str::limit($user->name,15)}}
                                                    </div>
                                                    <div class="hidden sm:flex  text-sm text-gray-900">
                                                        {{Str::limit($user->name,40)}}
                                                    </div>
                                                    <div class="text-sm text-gray-500 flex justify-start">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{$user->socio->disciplina->name}}
                                                        </span>
                                                       
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
                                            <span class="hidden text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                </svg> 6.5% </span>   
                                            <div class="text-sm text-gray-900 text-center font-bold mt-2"> {{$total}} Kms </div>
                                            
                                        </td>
        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"> 
                                                <div class="text-sm text-gray-900 text-center font-bold mt-2">  {{$week}} Kms </div>
                                               
                                                    <span class="hidden text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-danger bg-danger-light rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                                        </svg> 2.7% </span>
                                            </div>
                                        </td>
        
                                        
                                        
        
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Ver Perfil</a>
                                        
                                        </td>
                                    </tr>
        
                            
                            @endforeach
                            <!-- More people... -->
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