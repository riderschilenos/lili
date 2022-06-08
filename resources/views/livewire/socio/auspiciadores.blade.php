<div>
    <div class="grid grid-cols-3">
        @if ($socio->user->serie_enrolled)
        
            @foreach ($socio->user->serie_enrolled as $serie)
                <div class="text-center my-2">
                    <a href="{{route('series.show', $serie)}}" class="text-main-color">
                        <img class="h-16 w-20 mx-auto"
                        src="{{Storage::url($serie->image->url)}}"
                        alt="">
                    </a>
                </div>
            @endforeach

        @endif

    </div>
</div>
