<div>
   @php
       $hoursRemaining=0;
       $minutesRemaining=0;
       $total=0;
   @endphp
   @foreach ($activities as $activitie)
        @php
            $date1=date($activitie->start_date_local);
            $date2=date($ticket->updated_at);
        @endphp
        {{-- comment
        {{$date1}}<br>
        {{$date2}} <br> --}}
    
        @if ($date1>$date2)
            @php
                    $total+=floatval($activitie->distance);
            @endphp
        @endif
     
   @endforeach
   <a href="{{route('ticket.view',$ticket)}}">
        @if ($ticket->status==4)
            <div class="bg-gray-100 p-4 rounded-lg shadow-lg text-center">
                                            
                <div class="text-4xl font-bold my-4" id="kilometers">Felicidades!!</div>
                <div class="text-2xl font-semibold mb-2">Desafio Completado!</div>
                
                <div id="clock" class="text-sm hidden">Quedan {{ $hoursRemaining }} horas y {{ $minutesRemaining }} minutos</div>
                
            </div>
        @else
            <div class="bg-gray-100 p-4 rounded-lg shadow-lg text-center">
                                            
                <div class="text-4xl font-bold my-4" id="kilometers">{{$total}} Kms</div>
                <div class="text-2xl font-semibold mb-2">Recorridos con Strava</div>
                
                <div id="clock" class="text-sm hidden">Quedan {{ $hoursRemaining }} horas y {{ $minutesRemaining }} minutos</div>
                
            </div>
        @endif
    </a>
    @php

        $endTime = $ticket->updated_at->addHours(10000);

    @endphp
    <script>
    const clockDisplay = document.getElementById('clock');
    
    function updateClock() {
        const endTime = new Date(<?php echo json_encode($endTime) ?>);
        const currentTime =  new Date(); // Reemplaza con tu fecha de finalización

        const timeRemaining = endTime.getTime() - currentTime.getTime();

        const seconds = Math.floor((timeRemaining / 1000) % 60);
        const minutes = Math.floor((timeRemaining / (1000 * 60)) % 60);
        const hours = Math.floor(timeRemaining / (1000 * 60 * 60));

        clockDisplay.innerText = `Quedan ${hours} horas, ${minutes} minutos y ${seconds} segundos`;
    }

    updateClock(); // Actualiza inicialmente

    setInterval(updateClock, 1000); // Actualiza cada segundo
    </script>
</div>
