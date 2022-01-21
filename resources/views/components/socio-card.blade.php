@props(['socio'])

<article class="flex items-center w-full justify-center">

            <div class="max-w-xs flex flex-col">
                <div class="bg-white shadow-xl rounded-lg">

                    <div class="photo-wrapper p-2">
                        <a href= "{{route('socio.show', $socio)}}">
                        <img class="w-32 cursor-pointer h-40 mx-auto object-cover rounded-md" src="{{ $socio->user->profile_photo_url }}" alt="{{$socio->name}}">
                        </a>
                    </div>


                    <div class="flex flex-1 flex-col">
                        <a href= "{{route('socio.show', $socio)}}">
                        <h3 class="text-center cursor-pointer text-xl text-gray-900 font-medium leading-8">{{$socio->name}}</h3>
                        </a>
                        <div class="text-center text-gray-400 text-xs font-semibold ">
                            <p>Socio RidersChilenos</p>
                        </div>
                        <table class="text-xs mt-auto">
                            <tbody><tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Localidad</td>
                                <td class="px-2 py-2">{{$socio->direccion->comuna}}, {{$socio->direccion->region}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Disciplina</td>
                                <td class="px-2 py-2">{{$socio->disciplina->name}}</td>
                            </tr>
                            
                        </tbody></table>
            
                        <div class="text-center my-3">
                            <a href= "{{route('socio.show', $socio)}}" class="text-sm text-red-500 italic hover:underline hover:text-red-600 font-medium" href="#">Ver Perfil</a>
                        </div>
            
                    </div>

                </div>
            </div>
    
</article>