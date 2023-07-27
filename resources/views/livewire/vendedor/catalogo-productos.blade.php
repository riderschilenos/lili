<div class="mb-12">
    <div class="bg-white">
        <div class="pt-4 pb-6 sm:py-4 lg:max-w-7xl lg:mx-auto lg:px-8">

           

                <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-2">

                    

                    @if(!is_null($selectedcategory))
                        <div class="w-full bg-indigo-600 rounded-full my-2">
                            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between flex-wrap">
                                <div class="w-0 flex-1 flex items-center">
                                <span class="flex p-2 rounded-lg bg-indigo-800">
                                    <!-- Heroicon name: outline/speakerphone -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                    </svg>
                                </span>
                                <p class="ml-3 font-medium text-white truncate">
                                    <span class="md:hidden"> Categoria: {{$selectedcategory->name}} </span>
                                    <span class="hidden md:inline"> Categoria: {{$selectedcategory->name}} </span>
                                </p>
                                </div>
                                
                                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                                <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" wire:click="cancelcategory">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif

                    @if($producto)
                        <div class="w-full bg-red-600 rounded-full my-2">
                            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between flex-wrap">
                                <div class="w-0 flex-1 flex items-center">
                                <span class="flex p-2 rounded-lg bg-indigo-800">
                                    <!-- Heroicon name: outline/speakerphone -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                    </svg>
                                </span>
                                <p class="ml-3 font-medium text-white truncate">
                                    <span class="md:hidden"> Producto: {{$producto->name}} </span>
                                    <span class="hidden md:inline"> Producto: {{$producto->name}} </span>
                                </p>
                                </div>
                                
                                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                                <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" wire:click="cancelproducto">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>

                    @endif
                    @if($selectedmarca)
                        <div class="w-full bg-gray-800 rounded-full my-2">
                            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between flex-wrap">
                                <div class="w-0 flex-1 flex items-center">
                                <span class="flex p-2 rounded-lg bg-indigo-800">
                                    <!-- Heroicon name: outline/speakerphone -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                    </svg>
                                </span>
                                <p class="ml-3 font-medium text-white truncate">
                                    <span class="md:hidden"> Marca: {{$selectedmarca->name}} </span>
                                    <span class="hidden md:inline"> Marca: {{$selectedmarca->name}} </span>
                                </p>
                                </div>
                                
                                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                                <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" wire:click="cancelmarca">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>

                    @endif


                </div>
            

                @if(is_null($selectedcategory))
                    <h1 class="text-center mb-4"> ¿Qué Tipo de producto buscas?</h1>
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
                      
                        <article class="cursor-pointer" wire:click="category(1)">
                            <figure>
                                    <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/carcasas.jpg')}}" alt="">
                            </figure>
                        </article>

                        <article class="cursor-pointer" wire:click="category(2)">
                            <figure>
                                    <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/accesorios.jpg')}}" alt="">
                            </figure>
                        </article>

                        <article class="cursor-pointer" wire:click="category(3)">
                            <figure>
                                    <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/poleras.jpeg')}}" alt="">
                            </figure>               
                        </article>


                    </div>
                

                @endif
                
                @if(!is_null($marcas))

                @if($selectedmarca)
                <h1 class="text-center py-10 font-bold">CATALOGO DE LA MARCA {{$selectedmarca->name}}</h1>      
                    @if ($selectedcategory->id==1)             
                        <img class="w-full object-cover object-center rounded-lg" src="{{Storage::url($selectedmarca->catalogocarcasas)}}" alt="">    
                    @endif
                    @if ($selectedcategory->id==2)             
                    <img class="w-full object-cover object-center rounded-lg" src="{{Storage::url($selectedmarca->catalogoaccesorios)}}" alt="">    
                @endif


                @else
                    <h1 class="text-center mb-12"> Seleccione una marca </h1>
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-6 gap-y-8">
                        @foreach ($marcas as $marca)
                            @if ($selectedcategory->id==1)
                                @if ($marca->catalogocarcasas)
                                    @if ($marca->image)
                                        <div class="flex h-screen cursor-pointer" wire:click="marca({{$marca->id}})">
                                            <div class="m-auto">
                                                <img class="h-38 mx-auto w-44 object-contain" src="{{Storage::url($marca->image->url)}}" alt="">
                                            </div>
                                        </div>
                                    @else
                                    <div class="flex h-screen bg-gray-800 cursor-pointer" wire:click="marca({{$marca->id}})">
                                        <div class="m-auto p-1">
                                        <h3 class="text-center text-white my-4 font-bold">{{$marca->name}}</h3>
                                        </div>
                                    </div>
                                    @endif
                                @endif 
                            @endif
                            @if ($selectedcategory->id==2)
                                @if ($marca->catalogoaccesorios)
                                    @if ($marca->image)
                                        <div class="flex h-screen cursor-pointer" wire:click="marca({{$marca->id}})">
                                            <div class="m-auto">
                                                <img class="h-38 mx-auto w-44 object-contain" src="{{Storage::url($marca->image->url)}}" alt="">
                                            </div>
                                        </div>
                                    @else
                                    <div class="flex h-screen bg-gray-800 cursor-pointer" wire:click="marca({{$marca->id}})">
                                        <div class="m-auto p-1">
                                        <h3 class="text-center text-white my-4 font-bold">{{$marca->name}}</h3>
                                        </div>
                                    </div>
                                    @endif
                                @endif 
                            @endif 
                                    
                            

                        @endforeach

                    </div>
                
                @endif

                @elseif(!is_null($selectedcategory))
                <h1 class="text-center mb-12"> Seleccione un producto </h1>
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-6 gap-y-8">
                        @foreach ($products as $product)    
                                @if ($product->image)
                                    <article class="cursor-pointer" wire:click="producto({{$product->id}})">
                                        <figure>
                                                <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{Storage::url($product->image)}}" alt="">
                                        </figure>
                                    </article>
                                @else
                                    <div class="flex h-screen bg-gray-800 cursor-pointer col-span-3" wire:click="producto({{$product->id}})">
                                        <div class="m-auto p-1">
                                            <h3 class="text-center text-white my-4 font-bold">{{$product->name}}</h3>
                                        </div>
                                    </div>
                                @endif
                        @endforeach

                    </div>
                @endif

                
        </div>

    </div>
    
</div>
