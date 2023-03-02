<div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
    <div class="card pb-8 ">    
    <!-- Create By Joker Banny -->

    <!-- Header Navbar -->

  
  
  <!-- Title -->
  <div class="flex flex-wrap items-center  overflow-x-auto overflow-y-hidden py-10 justify-center   bg-white text-gray-800">
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

  <div class="bg-white">
    <h1 class="text-center text-2xl font-bold text-gray-800 mt-6">Marketplace RidersChilenos</h1>
    <div class="px-6 py-4  my-4">
        <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese nombre, categoria o descripción del producto que busca" required autofocus autocomplete="off">
    </div>
  </div>
  
  <!-- Tab Menu -->

  
  <!-- Product List -->
  <section class="py-10 bg-gray-100">
    <div class="mx-auto grid max-w-7xl  grid-cols-2 gap-6 py-6 px-2 md:px-6 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5">
      @foreach ($productos as $producto)
        <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
            <div class="relative flex justify-center items-end overflow-hidden rounded-xl">
                <img src="{{Storage::url($producto->image)}}" class="h-44" alt="Hotel Photo" />
               
            </div>
    
            <div class="mt-1 p-2">
                <h2 class="text-slate-700">{{$producto->name}}</h2>
                <p class="mt-1 text-sm text-slate-400">Despacho todo Chile</p>
    
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
            </a>
        </article>
      @endforeach
     
 
  </section>
  

    

    
      
          

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
    
        
   
        
        
            <div class="justify-between mt-8 bg-gray-200">

                <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
            
                    <article>
                        <figure>
                            <a href="https://www.instagram.com/reel/CVyzsrhpZE3/?utm_source=ig_web_copy_link" target="_blank">
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe2.png')}}" alt="">
                            </a>
                        </figure>
                    
                    </article>
                    <div>
                        <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                        <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
            
                    </div>


                </div>
        
            </div>
        

    
  
            
    </div>

</div>