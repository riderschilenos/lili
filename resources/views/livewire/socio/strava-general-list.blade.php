<div class="flex flex-wrap -mx-3 mb-5">
    <div class="container py-2">
        <div class="card">
            <div class="px-3 py-4">
                
                <h1 class="text-2xl font-bold text-center mb-4">Ranking Strava</h1>
              
                
              
        <x-table-responsive>
                
    
            @if ($atletas_stravas->count())
    
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        RIDERS
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            KMS
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PROGRESO
                        </th>
                    
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
    
                        @foreach ($atletas_stravas as $atleta)
    
                                
                                <tr >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                    
                                                    <img class="h-11 w-11 object-cover object-center rounded-full" src="{{$atleta->user->profile_photo_url }}" alt=""  />
                                                
                                                    
                                                
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm text-gray-900">
                                                    {{Str::limit($atleta->user->name,15)}}
                                                </div>
                                                <div class="text-sm text-gray-500">
        
                                                        
                                                                
                                                                     
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                       {{$atleta->user->socio->disciplina->name}}
                                                    </span>
                                                
                                                </div>
                                                
                                            </div>
                                        </div>
                                       
                                    </td>
                                    @php
                                        $total=0;
                                    @endphp
                                        @if ($atleta->user->activities)
                                            @foreach ($atleta->user->activities as $activitie)
                                               
                                                {{-- comment
                                                {{$date1}}<br>
                                                {{$date2}} <br> --}}
                                            
                                                    @php
                                                            $total+=floatval($activitie->distance);
                                                    @endphp
                                               
                                            @endforeach
                                        @endif
                                   
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                            </svg> 6.5% </span>   
                                        <div class="text-sm text-gray-900 text-center font-bold mt-2"> {{$total}} Kms </div>
                                        
                                    </td>
    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> 
                                            
                                                <span class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-danger bg-danger-light rounded-lg">
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