@props(['producto'])

<div class="flex items-center w-full justify-center bg-gray-50 p-5">

            <article class="flex flex-col">
                <div class="bg-white shadow-xl rounded-lg  p-2">

                    <div class="photo-wrapper">
                        <a href= "">
                        <img loading="lazy" class="cursor-pointer h-36 w-full object-cover rounded-md" src="{{Storage::url($producto->image)}}" alt="{{$producto->name}}">
                        </a>
                    </div>


                    <div class="px-2 flex flex-1 flex-col">
                        <a href= "">
                        <h3 class="text-center cursor-pointer text-lg font-bold text-gray-900 leading-8">{{Str::limit($producto->name,16)}}</h3>
                        </a>
                        
                        {{-- <div class="text-center text-gray-400 text-xs font-semibold ">
                            <p>Socio RidersChilenos</p>
                        </div> --}}
                       
                        
                        <div class="flex justify-center">
                            
                                    <span class="mx-auto"><span class="bg-red-500 py-1 px-2 rounded text-white text-sm">Comprar</span></span>
                                  
                        </div>

                    </div>

                </div>
            </article>
    
</div>