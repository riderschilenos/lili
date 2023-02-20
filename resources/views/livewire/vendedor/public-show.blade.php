<div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
                    
    <div class="card pb-8 ">
      
          

        <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-4 lg:mx-14">
            <article class="col-span-2 sm:col-span-2">
                <figure>
                    <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/first.png')}}" alt=""></a>
                </figure>
    
            
            </article>
            <article  class="hidden md:block mx-10">
                @if (auth()->user())
                    <figure>
                        <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                    </figure>
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