
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-7xl my-auto order-1 md:order-2">
    @php
        $lugar=0;
        $n=1;

        foreach ($atletas_stravas7dias as $user) {
           if ($user->id==auth()->user()->id) {
                $lugar=$n;
           }
           $n+=1;
        }
        foreach ($atletas_stravas7dias2 as $user) {
            if ($user->id==auth()->user()->id) {
                $lugar=$n;
            }
           $n+=1;
        }
        
    @endphp

    <a href="{{route('socio.ranking.strava')}}">
        <div class="p-4 flex items-center">
            <div class="px-2 bg-blue-500 p-2 rounded-lg text-center">
                <p class="text-4xl font-bold text-white">{{$lugar}}°</p>
                <p class="text-sm text-white">Lugar</p>
            </div>
            <div class="ml-4">
            <div class="uppercase tracking-wide text-lg text-indigo-500 font-semibold">Ranking Strava en Vivo</div>
            
                <p class="mt-2 text-gray-500">Revisa el Ranking Completo Aquí</p>
        
            </div>
        </div>
    </a>
</div>

