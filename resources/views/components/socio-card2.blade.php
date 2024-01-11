@props(['socio'])

<article class="">
    <div class="grid grid-cols-6 shadow-lg rounded-lg">
        <div class="col-span-2 items-center content-center my-auto px-1 py-1 bg-main-color">
            <a href="{{ route('socio.show', $socio) }}">
                @if ($socio->user)
                    @if (str_contains($socio->user->profile_photo_url,'https://ui-'))
                        <img class="w-full h-36  object-cover content-center items-center" src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg" alt="{{ $socio->name }}">
                    @else
                        <img class="w-full h-36  object-cover content-center items-center" src="{{ $socio->user->profile_photo_url }}" alt="{{ $socio->name }}">
                    @endif
                @else
                    <img class="w-full h-36  object-cover content-center items-center" src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg" alt="{{ $socio->name }}">
                @endif
            </a>
        </div>
        <div class="pl-2 py-2 col-span-4 bg-white flex flex-col">
            <div class="flex justify-between">
                <a href="{{ route('socio.show', $socio) }}">
                    <p class="text-gray-500 text-base font-bold mt-auto">{{ strtoupper(Str::limit($socio->name, 20)) }}</p>
                </a>
                <div class="flex mx-2 items-center">
                    @if ($socio->user->resultados->count()>0)
                        {{ $socio->user->resultados->count()}}  <img class="w-3 h-3 mx-1" src="{{asset('img/copa.png')}}" alt="">
                    @else
                        0 <img class="w-3 h-3 mx-1" src="{{asset('img/copa.png')}}" alt="">
                    @endif
                </div>
            </div>
            
            
            <div class="flex items-center content-center">
                @if($socio->direccion)
                    <div class="px-2 py-2 text-red-500 font-semibold content-center">
                    <i class="fa fa-map-marker my-auto py-auto" aria-hidden="true"></i>
                </div>
                
                    <div class="px-2 py-2">{{Str::limit($socio->direccion->comuna.', '.$socio->direccion->region,20)}}</div>
                @endif
            </div>

            @php
                $now = config('app.now_global');
                $borndate = strtotime($socio->born_date);
                // Calcula la diferencia en segundos
                $diferencia_segundos = strtotime($now) - $borndate;
                $diferencia_anios = floor($diferencia_segundos / (365 * 24 * 60 * 60));
            @endphp
            <div class="text-sm text-gray-500 flex justify-start">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 mr-2">
                    {{$diferencia_anios}} Años
                </span>
            
            </div>

            
            <div class="flex justify-betten items-center content-center mt-auto">

                <span class="">
                    <a href="{{ route('socio.show', $socio) }}">
                        <span class="bg-red-500 py-1 px-2 rounded text-white text-sm">{{$socio->disciplina->name}}</span>
                    </a>
                </span>
               
                                                    
                    @php
                        $n=0;
                    @endphp
                    @foreach ($socio->user->vehiculos as $vehiculo)
                        @if($vehiculo->status==5 || $vehiculo->status==6)
                            @php
                                $n+=1;
                            @endphp    
                        @endif
                    @endforeach
                  
                    <a href="{{ route('socio.show', $socio) }}" class="flex ml-auto whitespace-nowrap">
                       @if ($n==1)
                            <div class="flex ml-auto whitespace-nowrap">
                                <div class="py-2">{{$n}} Registro</div>
                                <div class="p-2 py-2 text-red-500 font-semibold content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    
                                </div>
                            </div>
                           
                       @elseif($n==0 || $n>1)
                            <div class="flex ml-auto whitespace-nowrap">
                                <div class="py-2">{{$n}} Registros</div>
                                <div class="p-2 py-2 text-red-500 font-semibold content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    
                                </div>
                            </div>
                       @endif
                    </a>
                    
            </div>
           
            <!-- Aquí puedes añadir más detalles del socio si es necesario -->
            <!-- Sigue el formato similar al perfil del vehículo -->
            <!-- Recuerda reemplazar $socio con la variable correcta -->
        </div>
      
    </div>
</article>