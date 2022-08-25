<div>

            <form class="ml-4 pt-2 relative text-gray-600" autocomplete="off">
                <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                type="search" name="search" placeholder="Buscar">


                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2 ">
                Buscar
                </button>
                @if ($search)
                <ul class="absolute z-40 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
                    @forelse ($this->riders as $rider)
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            <a href="{{route('socio.show',$rider)}}">{{$rider->name}}</a>
                        </li>
                        @empty
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            No se encontraron riders...
                        </li>
                            
                    
                    @endforelse
                    @forelse ($this->series as $serie)
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            <a href="{{route('series.show',$serie)}}">{{$serie->titulo}}</a>
                        </li>
                        @empty
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            No se encontraron series...
                        </li>
                            
                        
                    @endforelse
                    @forelse ($this->eventos as $evento)
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            <a href="{{route('ticket.evento.show',$evento)}}">{{$evento->titulo}}</a>
                        </li>
                        @empty
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            No se encontraron eventos...
                        </li>
                            
                        
                    @endforelse
                   
                    
                </ul>
            
                    
                @else
                    
                @endif
                
            </form>

</div>
