<div class="mb-12">
    <div class="bg-white">
        <div class="py-10 sm:py-4 lg:max-w-7xl lg:mx-auto lg:px-8">

            <h1 class="text-center text-3xl font-bold pb-4">CATALOGO PRODUCTOS</h1>

            

                @if(is_null($selectedcategory))
                    <h1 class="text-center mb-12"> ¿Que Tipo de producto buscas?</h1>
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
                <h1 class="text-center mb-12"> Seleccione un producto </h1>
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-6 gap-y-8">
                        @foreach ($marcas as $marca)    
                                @if ($marca->image)
                                    <div class="flex h-screen cursor-pointer">
                                        <div class="m-auto">
                                            <img class="h-38 mx-auto w-44 object-contain" src="{{Storage::url($marca->image->url)}}" alt="">
                                        </div>
                                    </div>
                                @else
                                <div class="flex h-screen bg-gray-800 cursor-pointer">
                                    <div class="m-auto">
                                      <h3 class="text-center text-white my-4">{{$marca->name}}</h3>
                                    </div>
                                  </div>
                                @endif
                        @endforeach

                    </div>
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
                                    <article class="cursor-pointer" wire:click="producto({{$product->id}})">
                                        <figure>
                                                <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/poleras.jpeg')}}" alt="">
                                        </figure>
                                    </article>
                                @endif
                        @endforeach

                    </div>
                @endif

                
        </div>

    </div>
    
</div>
