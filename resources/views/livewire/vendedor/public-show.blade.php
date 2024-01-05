<div class="max-w-7xl mx-auto pt-2 pb-8">
    <div class="card pb-8 ">    
    <!-- Create By Joker Banny -->

    <!-- Header Navbar -->

    <div class="flex justify-center ">

                                
                                    
        
            <a href="{{route('pagosqr.cliente')}}">
                <button class="hidden btn btn-danger w-full max-w-xs items-center justify-items-center mt-2"><i class="fa-solid fa-camera-web"></i> Pago QR</button>
            </a>
       
        

    </div>
  
  <!-- Title -->
  <div class="hidden flex items-center  overflow-x-auto overflow-y-hidden justify-center   bg-white text-gray-800">
    <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
        </svg>
        <span>Alpinestar</span>
    </a>
    <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 rounded-t-lg text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
        </svg>
        <span>Bianchi</span>
    </a>
    <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2  text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
        </svg>
        <span>Excepturi</span>
    </a>
    <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2  text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <circle cx="12" cy="12" r="10"></circle>
            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
        </svg>
        <span>Consectetur</span>
    </a>
</div>
    
  <div class="bg-white p-4">
    {{-- comment
    @livewire('vendedor.catalogo-productos')
 --}}
   
    
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div>

            </div>
            <div> 
                <section id="#seccion-product">
                    <h1 class="text-center text-2xl font-bold text-gray-800 mt-2">Tienda RidersChilenos</h1>
                </section>
                @can('Super admin')
                    <a class="flex justify-center mt-4" href="{{route('tiendas.create')}}">
                                            
                        <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mb-2">
                        
                            Inscribe tu Tienda

                        </button>
                    </a>
                @endcan
            </div>
            
                @if (auth()->user())
                    @if (auth()->user()->tiendas)
                        @foreach (auth()->user()->tiendas as $tienda)
                            <div class="flex flex-col md:ml-6 p-4 bg-gray-800 border-gray-800 shadow-md hover:shodow-lg rounded-2xl">
                                <div class="flex">
                                    <img src="https://images.unsplash.com/photo-1575390730294-dfc5efa5250b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=255&q=80" alt="Just a flower" class=" w-16  object-fit  h-16 rounded-2xl">
                                    <div class="flex flex-col justify-center w-full px-2 py-1">
                                        <div class="flex justify-between items-center ">
                                        <div class="flex flex-col">
                                            <a href="{{route('tiendas.edit',$tienda)}}">
                                                <h2 class="font-medium leading-none text-gray-100">{{$tienda->nombre}}</h2>
                                            </a>
                                        </div>
                                        <a href="{{route('tiendas.edit',$tienda)}}">
                                            <p class="text-gray-400 hover:text-green-400 cursor-pointer">
                                                Ver más
                                            </p>
                                        </a>
                                        </div>
                                        <div class="flex pt-2  text-sm text-gray-500">
                                        <div class="flex items-center mr-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                            </svg>
                                            <p class="font-normal">4.5</p>
                                        </div>
                                        <div class="flex items-center font-medium text-gray-300 ">
                                            $1800
                                            <span class="text-gray-600 text-sm font-normal"> /wk</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                                
                    @endif
                    
                @endif
        </div>
    
    <div class="px-6 my-4">
        <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese nombre, categoria o descripción del producto que busca" required autofocus autocomplete="off">
    </div>
  </div>
   
        @if ($product)
            <!-- Tab Menu -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
                <div class="flex flex-col md:flex-row -mx-4">
                  <div class="md:flex-1 px-4">
                    <div x-data="{ image: 1 }" x-cloak>
                      <div class="h-80 md:h-92 rounded-lg bg-gray-100 mb-4">
                        <div x-show="image === 1" class="h-80 md:h-92   rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            
                            <div class="flex justify-center">
                                <img src="{{Storage::url($product->image)}}" class="h-80 md:h-92  " alt="">
                             </div>
                        </div>
            
                        <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                          <span class="text-5xl">2</span>
                        </div>
            
                        <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                          <span class="text-5xl">3</span>
                        </div>
            
                        <div x-show="image === 4" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                          <span class="text-5xl">4</span>
                        </div>
                      </div>
            
                      <div class="flex mx-2 mb-4">
                        <template x-for="i in 4">
                          <div class="flex-1 px-2">
                            <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                <div class="flex justify-center p-3">
                                    <img src="{{Storage::url($product->image)}}" class="p-2" alt="">
                                </div>
                            </button>
                          </div>
                        </template>
                      </div>
                    </div>
                  </div>
                  <div class="md:flex-1 px-4 mx-2">
                    <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{$product->name}}</h2>
                    <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">ABC Company</a></p>
            
                    <div class="flex items-center space-x-4 my-4">
                      <div>
                        <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                          <span class="text-indigo-400 mr-1 mt-1">$</span>
                          <span class="font-bold text-indigo-600 text-3xl">{{number_format($product->precio)}}</span>
                        </div>
                      </div>
                      <div class="flex-1">
                        <p class="text-green-500 text-xl font-semibold">Save 12%</p>
                        <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
                      </div>
                    </div>
            
                    <p class="text-gray-500">
                        @if ($product->descripcion)
                            {{$product->descripcion}}
                        @endif
                    </p>
            
                    <div class="flex justify-between py-4 space-x-4">
                      <div class="relative my-auto">
                        <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold mb-2">Cantidad</div>
                            <select class="cursor-pointer appearance-none rounded-xl border mx-auto text-base border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1 w-32 text-center">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
            
                      
                      </div>
                        <div class="flex flex-col items-center w-full">
                            <button class="block w-full mb-2 h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                                Agregar al Carro
                            </button>
                            <button class="block w-full h-14 px-6 py-2 font-semibold rounded-xl bg-red-600 hover:bg-red-500 text-white">
                                Comprar
                            </button>
                        </div>
                    </div>
                    
                    <div class="w-full relative z-1 rounded overflow-hidden">
                            
                                
                        <div class="flex justify-center mt-6 mb-24">
                        <ul>
                            <li class="flex items-center">
                            <div class="bg-yellow-200 rounded-full p-2 fill-current text-yellow-700">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-umbrella"><path class="primary" d="M11 3.05V2a1 1 0 0 1 2 0v1.05A10 10 0 0 1 22 13c0 1.33-2 1.33-2 0a2 2 0 1 0-4 0c0 1.33-2 1.33-2 0a2 2 0 1 0-4 0c0 1.33-2 1.33-2 0a2 2 0 1 0-4 0c0 1.33-2 1.33-2 0a10 10 0 0 1 9-9.95z"/><path class="secondary" d="M11 14a1 1 0 0 1 2 0v5a3 3 0 0 1-6 0 1 1 0 0 1 2 0 1 1 0 0 0 2 0v-5z"/></svg>
                            </div>
                            <span class="text-gray-700 text-lg ml-3">Despacho a todo Chile</span>
                            </li>
                            <li class="flex items-center mt-3">
                            <div class="bg-yellow-200 rounded-full p-2 fill-current text-yellow-700">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-shopping-bag"><path class="primary" d="M5 8h14a1 1 0 0 1 1 .92l1 12A1 1 0 0 1 20 22H4a1 1 0 0 1-1-1.08l1-12A1 1 0 0 1 5 8z"/><path class="secondary" d="M9 10a1 1 0 0 1-2 0V7a5 5 0 1 1 10 0v3a1 1 0 0 1-2 0V7a3 3 0 0 0-6 0v3z"/></svg>
                            </div>
                            <span class="text-gray-700 text-lg ml-3">Paga con tarjetas debito y crédito</span>
                            </li>
                            <li class="flex items-center mt-3">
                            <div class="bg-yellow-200 rounded-full p-2 fill-current text-yellow-700">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-pie-chart"><path class="primary" d="M14 13h6.78a1 1 0 0 1 .97 1.22A10 10 0 1 1 9.78 2.25a1 1 0 0 1 1.22.97V10a3 3 0 0 0 3 3z"/><path class="secondary" d="M20.78 11H14a1 1 0 0 1-1-1V3.22a1 1 0 0 1 1.22-.97c3.74.85 6.68 3.79 7.53 7.53a1 1 0 0 1-.97 1.22z"/></svg>
                            </div>
                            <span class="text-gray-700 text-lg ml-3">2-3 Dias Hábiles en Despachar</span>
                            </li>
                        </ul>
                        </div>
                    
                    </div>
                  </div>
                </div>
            </div>
           
        @endif 
   
    <!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->

    
    <!-- Product List -->
  <section class="pb-10 bg-gray-100">
    <div class="mx-auto grid max-w-7xl  grid-cols-2 gap-6 py-6 px-2 md:px-6 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5">
      @foreach ($productos as $producto)
     
        <article  wire:click="set_product({{$producto->id}})" class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
          
            <div class="flex justify-center rounded-xl">
                <img src="{{Storage::url($producto->image)}}" class="h-44" alt="{{$producto->name}}" />
               
            </div>
    
            <div class="mt-1 p-2">
                <h2 class="text-slate-700">{{$producto->name}}</h2>
                <p class="hidden mt-1 text-sm text-slate-400">Despacho todo Chile</p>
    
                <div class="mt-3 flex items-end justify-between">
                    <p class="text-lg font-bold text-blue-500">${{number_format($producto->precio)}}</p>
    
                <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
    
                    <button class="hidden sm:block text-sm">Comprar</button>
                </div>
                </div>
            </div>
            
        </article>
      
      @endforeach
     
 
  </section>
  

    

    
      
    @if (auth()->user())
        @if (auth()->user()->vendedor)

        @else
            <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-4 lg:mx-14">
                <article class="col-span-2 sm:col-span-2">
                    <figure>
                        <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/first.png')}}" alt=""></a>
                    </figure>
        
                
                </article>
                <article  class="hidden md:block mx-10">
                    
                        <figure>
                            <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                        </figure>
                {{-- comment
                    @if (auth()->user())
                    @else
                        <div class="bg-red-600 rounded-lg max-w-sm mx-auto">
                            <h1 class="text-3xl text-center font-bold text-white pt-4">ACCESO RIDERS</h1>
                            
                            <div class="flex justify-center mb-4 ">
                                
                            <div class="block w-full mx-4 pb-4 text-white">
                                
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                        
                                    <div>
                                        <x-jet-label for="email" value="{{ __('Email') }}" class="text-white" />
                                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                    </div>
                        
                                    <div class="mt-4">
                                        <x-jet-label for="password" value="{{ __('Contraseña') }}" class="text-white"/>
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                    </div>
                        
                                    <div class="block mt-4">
                                        <label for="remember_me" class="flex items-center">
                                            <x-jet-checkbox id="remember_me" name="remember" />
                                            <span class="ml-2 text-sm text-white">{{ __('Recordar mi cuenta') }}</span>
                                        </label>
                                    </div>
                        
                                    <div class="flex items-center justify-end mt-4">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-white hover:text-gray-900 mr-auto" href="{{ route('register') }}">
                                            {{ __('Registrarme') }}
                                            </a>
                                        
                                        @endif
                        
                                        <x-jet-button class="ml-4">
                                            {{ __('Ingresar') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div> 
                            </div>
                        </div>
                    @endif
                    --}}
                </article>
            </div>


            <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
                <article class="hidden  md:block col-span-2 md:col-span-1">
                    <figure>
                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/second3.png')}}" alt="">
                    </figure>
        
                
                </article>
                <div class="block  md:hidden col-span-2 md:col-span-1">
                    <article class="flex justify-center mt-2">
                        <figure>
                            <img class="h-48 object-contain" src="{{asset('img/vendedores/second3.png')}}" alt="">
                        </figure>
                    </article>
                </div>
                <article class="col-span-2 sm:col-span-2">
                    <figure>
                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/tree3.png')}}" alt="">
                    </figure>
                
                </article>
            
            
            </div>
        @endif
    @endif
   
        
        
        

    
  
            
    </div>

</div>