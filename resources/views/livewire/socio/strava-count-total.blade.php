<div class="flex justify-center pb-2 items-center">
    @php
        $totalactivitierch=0;
        $activityweek=0;
        foreach ($activities as $activitie) {
                $totalactivitierch+=floatval($activitie->distance);
            }
        foreach ($activities7 as $activitie) {
                $activityweek+=floatval($activitie->distance);
            }
    @endphp
    <div class="bg-white rounded-lg profile-card w-96">
    
        <div class="text-center mb-4">
            <div class="grid grid-cols-3">
                <div class="flex md:hidden">
                    <div class="w-full h-20  my-auto items-center m-auto rounded-xl text-white shadow-2xl" style="backface-visibility:hidden">
                        <img src="{{asset('img/strava/strava.jpg')}}" class="relative object-cover w-full h-full rounded-xl" />
                    
                    </div>
                </div>
                <div class="col-span-2 md:col-span-3 flex items-center">
                    <h2 class="text-xl font-semibold items-center my-auto">¿Cuanto Kilómetros Hemos Pedaleado?</h2>
                </div>

            </div>
        
        
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="text-center p-2 bg-gray-100 rounded-lg">
            
                <p class="text-lg font-semibold mt-2">{{$totalactivitierch}} km</p>
                <p class="text-sm text-gray-600">Total</p>
            </div>
            <div class="text-center p-2 bg-gray-100 rounded-lg">
                <p class="text-lg font-semibold mt-2">{{$activityweek}} km</p>
                <p class="text-sm text-gray-600">Ultimos 7 Días</p>
            </div>
        </div>
    </div>
</div>