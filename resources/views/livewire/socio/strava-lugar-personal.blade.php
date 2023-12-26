
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-7xl my-auto order-1 md:order-2">

    @php
        $lugar=0;
        $n=1;

        foreach ($atletas_stravas7dias as $user) {
           if ($user->id==auth()->user()->id) {
                $lugar=$n;
                $total=0;
                $week=0;
                                           
                if ($user->activities){
                    foreach ($user->activities as $activitie){
                        $date1 = strtotime($activitie->start_date_local);
                        $date2 = strtotime($now);
                        // Calcula la diferencia en segundos entre las dos fechas
                        $difference = $date2 - $date1;

                        // Convierte la diferencia de segundos a días
                        $daysDifference = floor($difference / (60 * 60 * 24));
                    
                                                    
                                                           
                        $total+=floatval($activitie->distance);
                        if ($daysDifference < 7) {
                            $week+=floatval($activitie->distance);
                        }
                                                            
                    }
                                                  
                }

           }
           $n+=1;
        }
        foreach ($atletas_stravas7dias2 as $user) {
            if ($user->id==auth()->user()->id) {
                $lugar=$n;
                $total=0;
                $week=0;
                if ($user->activities){
                    foreach ($user->activities as $activitie){
                        $date1 = strtotime($activitie->start_date_local);
                        $date2 = strtotime($now);
                        // Calcula la diferencia en segundos entre las dos fechas
                        $difference = $date2 - $date1;

                        // Convierte la diferencia de segundos a días
                        $daysDifference = floor($difference / (60 * 60 * 24));
                    
                                                    
                                                           
                        $total+=floatval($activitie->distance);
                        if ($daysDifference < 7) {
                            $week+=floatval($activitie->distance);
                        }
                                                            
                    }
                                                  
                }
                
            }
           $n+=1;
        }
        
    @endphp

    <a href="{{route('socio.ranking.strava')}}">
        <div class="p-4 flex items-center">
            <div class="px-2 bg-red-500 p-2 rounded-lg text-center">
                <p class="text-4xl font-bold text-white">{{$lugar}}°</p>
                <p class="text-sm text-white">Lugar</p>
            </div>
            @if(Route::currentRouteName() == 'socio.ranking.strava')
                <div class="ml-4">
                    <div class="uppercase tracking-wide text-lg text-gray-800 font-semibold whitespace-nowrap">{{$week}} Kms en los ultimos 7 días</div>
                    <p class="mt-2 text-gray-500">{{$total}} Kms en los ultimos 7 días</p>
                </div>
            @else
                <div class="ml-4">
                    <div class="uppercase tracking-wide text-lg text-gray-800 font-semibold whitespace-nowrap">Ranking Strava en Vivo</div>
                    <p class="mt-2 text-gray-500">Revisa el Ranking Completo Aquí</p>
                </div>
            @endif
           
        </div>
    </a>
</div>

