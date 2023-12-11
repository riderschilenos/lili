<div class="flex justify-center pb-2 items-center">
    @php
        $totalactivitierch=0;
        $activityweek=0;
       
                                                   
        foreach ($activities as $activitie) {
                $totalactivitierch+=floatval($activitie->distance);
                $date1 = strtotime($activitie->start_date_local);
                $date2 = strtotime($now);

                // Calcula la diferencia en segundos entre las dos fechas
                $difference = $date2 - $date1;

                // Convierte la diferencia de segundos a días
                $daysDifference = floor($difference / (60 * 60 * 24));

                if ($daysDifference < 7) {
                    $activityweek+=floatval($activitie->distance);
                }
            }
    @endphp

      <div class="bg-white rounded-lg profile-card w-96">
      
          <div class="text-center mb-4">
              @if(Route::currentRouteName() == 'socio.ranking.strava')
                
                  <h1 class="text-2xl font-bold text-center mb-4">Ranking Strava en Vivo</h1>

              @else
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
              @endif
              
          
          
          </div>
          <div class="counting-values flex justify-center items-center" data-total="{{ $totalactivitierch }}" data-week="{{ $activityweek }}"></div>

      </div>

    <script>
      var cantriders = <?php echo json_encode($atletastrava->count()) ?>;

        document.addEventListener("DOMContentLoaded", function () {
    const countingElements = document.querySelectorAll(".counting-values");
    const cantrid = cantriders; // Duración en segundos (2 minutos)
    countingElements.forEach((element) => {
    const totalValue = parseFloat(element.getAttribute("data-total"));
    const weekValue = parseFloat(element.getAttribute("data-week"));
    const duration = 30000; // Duración en segundos (2 minutos)
    const interval = 1000; // Intervalo de actualización en milisegundos
    const stepsTotal = (totalValue + 50) / (duration / (interval / 1000));
    const stepsWeek = (weekValue + 3) / (duration / (interval));

    let currentTotal = totalValue-50;
    let currentWeek = weekValue-3;

    const updateValues = () => {
      if (currentTotal <= totalValue && currentWeek <= weekValue) {
        element.innerHTML = `
          <div class="text-center p-2 bg-gray-100 rounded-lg">
            <p class="text-lg font-semibold">${currentTotal.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&.')} km</p>
            <p class="text-sm text-gray-600">Total</p>
          </div>
          <div class="text-center p-2 bg-gray-100 rounded-lg ml-2">
            <p class="text-lg font-semibold">${currentWeek.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&.')} km</p>
            <p class="text-sm text-gray-600">Ultimos 7 Días</p>
          </div>
          <div class="items-center my-auto">
            <div class="ml-2 mb-1 items-center my-auto text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-1 text-center">
              <p class="items-center my-auto font-semibold text-sm">${cantriders} Riders</p>
            </div>
            <div class="ml-2 items-center my-auto text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-1 text-center">
              <p class="items-center my-auto font-semibold text-xs">Ver Ranking</p>
            </div>
          </div>
        `;
        currentTotal += stepsTotal;
        currentWeek += stepsWeek;
        setTimeout(updateValues, interval);
      }
    };

    updateValues();
  });
});

    </script>
</div>