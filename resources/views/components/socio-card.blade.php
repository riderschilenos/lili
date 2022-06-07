@props(['socio'])

<article class="flex items-center w-full justify-center">

            <div class="flex flex-col">
                <div class="bg-white shadow-xl rounded-lg">

                    <div class="photo-wrapper p-2">
                        <a href= "{{route('socio.show', $socio)}}">
                        <img class="w-44 cursor-pointer h-48 mx-auto object-cover rounded-md" src="{{ $socio->user->profile_photo_url }}" alt="{{$socio->name}}">
                        </a>
                    </div>


                    <div class="px-2 flex flex-1 flex-col">
                        <a href= "{{route('socio.show', $socio)}}">
                        <h3 class="text-center cursor-pointer text-xl text-gray-900 font-medium leading-8">{{Str::limit($socio->name,16)}}</h3>
                        </a>
                        
                        {{-- <div class="text-center text-gray-400 text-xs font-semibold ">
                            <p>Socio RidersChilenos</p>
                        </div> --}}
                        <table class="text-xs mt-auto">
                            <tbody>
                                
                           
                                <tr>
                                    <td class="px-2 py-2 text-gray-500 font-semibold">Localidad</td>
                                    @if(!is_null($socio->direccion))
                                    <td class="px-2 py-2">{{$socio->direccion->comuna}}, {{$socio->direccion->region}}</td>
                                    @endif
                                </tr>
                            
                            
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Disciplina</td>
                                <td class="px-2 py-2">{{$socio->disciplina->name}}</td>
                            </tr>
                            
                        </tbody></table>
                        
                        <div class="flex justify-center">
                            @switch($socio->status)
                                @case(1)
                                    <span class="mx-auto"><span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Vigente</span></span>
                                    @break
                                @case(2)
                                    <span class="mx-auto"><span class="bg-red-500 py-1 px-2 rounded text-white text-sm">INACTIVO</span></span>
                                    @break
                                @default
                                
                            @endswitch
                        </div>

                        <div class="text-center my-3">
                            <a href= "{{route('socio.show', $socio)}}" class="text-sm text-red-500 italic hover:underline hover:text-red-600 font-medium" href="#">Ver Perfil</a>
                        </div>
            
                    </div>

                </div>
            </div>
    
</article>