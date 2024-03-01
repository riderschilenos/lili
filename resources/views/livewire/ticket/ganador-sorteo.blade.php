<div>
    <section class="card mb-4">
        <div class="card-body">
            <div class="flex justify-center items-center">
                <input wire:model="premio" class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Indicar premio...">
                <button class="bg-red-500 shadow h-12 px-4 rounded-lg text-white font-bold ml-4" wire:click="add_winner">
                    <i class="fas fa-medal text-base mr-2"></i>
                    Obtener Ganador
                </button>            
            </div>
        </div>
    </section>
    @foreach ($evento->ganadores->reverse() as $ganador)

        <section class="card mb-4">
            <div class="card-body">
                <h1 class="font-bold mb-6">  PREMIO: {{$ganador->premio}} - Boleto Ganador: #{{$ganador->nro_premio}} (Ticket #{{$ganador->inscripcion->ticket->id}})</h1>
                <div class="flex items-center mb-4">
                    @if (str_contains($ganador->inscripcion->ticket->user->profile_photo_url,'https://ui-'))
                        <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg" alt="{{ $evento->organizador->name }}"  />
                    
                    @else
                        <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $ganador->inscripcion->ticket->user->profile_photo_url }}" alt="{{ $ganador->inscripcion->ticket->user->name }}"  />
                    
                    @endif
                    
                    <div class="ml-4">
                        <h1 class="font-fold text-gray-500 text-lg">Ganador: {{ $ganador->name }}</h1>
                            @if ($ganador->inscripcion->ticket->user->socio)
                                <a class="text-blue-400 text-sm font-bold" href="{{route('socio.show',$ganador->inscripcion->ticket->user->socio)}}">{{'@'.Str::slug($ganador->inscripcion->ticket->user->socio->slug,'')}}</a>
                            @endif
                        <h1 class="font-fold text-gray-500 text-lg">Fecha de compra: {{ $ganador->inscripcion->updated_at }}</h1>
                    </div>
                </div>
            </div>
        </section>

    @endforeach
</div>
