<div class="mb-12 hidden">
    <div class="bg-white">
        <div class="py-16 sm:py-8 lg:max-w-7xl lg:mx-auto lg:px-8">

            <h1 class="text-center text-3xl font-bold pb-4 pt-10 sm:pt-4">CATALOGO PRODUCTOS</h1>

            

                @if(is_null($selectedcategory))
                    <h1 class="text-center mb-12"> ¿Que Tipo de producto buscas?</h1>
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
                      
                        <article wire:click="category('carcasas')">
                            <figure>
                                    <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/carcasas.jpg')}}" alt="">
                            </figure>
                
                          
                        </article>
                        <article wire:click="category('accesorios')">
                            <figure>
                                    <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/accesorios.jpg')}}" alt="">
                            </figure>
                          
                        </article>
                        <article wire:click="category('ropa')">
                            <figure>
                                    <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/poleras.jpeg')}}" alt="">
                            </figure>
                           
                        </article>
                    </div>
                @endif

                @if(!is_null($selectedcategory))
                <h1 class="text-center mb-12"> Seleccione un producto </h1>
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-4 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-6 gap-y-8">
                  
                    <article wire:click="category('carcasas')">
                        <figure>
                                <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/carcasas.jpg')}}" alt="">
                        </figure>
            
                      
                    </article>
                    <article wire:click="category('accesorios')">
                        <figure>
                                <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/accesorios.jpg')}}" alt="">
                        </figure>
                      
                    </article>
                    <article wire:click="category('accesorios')">
                        <figure>
                                <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/accesorios.jpg')}}" alt="">
                        </figure>
                      
                    </article>
                    <article wire:click="category('ropa')">
                        <figure>
                                <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/poleras.jpeg')}}" alt="">
                        </figure>
                       
                    </article>
                </div>
            @endif
        </div>

    </div>
    
</div>
