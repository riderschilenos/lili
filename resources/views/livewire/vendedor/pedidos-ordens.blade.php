<div>
    @php
    $subtotal=0;
    @endphp


            @if($pedido->pedidoable_type=="App\Models\Socio")
                @foreach ($pedido->ordens as $orden)
                @php
                    
                    $subtotal+=$orden->producto->precio-$orden->producto->descuento_socio;

                @endphp    
                @endforeach

            @endif
            @if($pedido->pedidoable_type=="App\Models\Invitado")
                @foreach ($pedido->ordens as $orden)
                @php
                    
                     $subtotal+=$orden->producto->precio;

                @endphp    
                @endforeach

            @endif



    <div x-data="{open: false}">
        <div class="flex">
            <h1 class="text-xl font-bold mt-6">Subtotal: ${{number_format($subtotal)}}-.</h1>
            <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer justify-end ml-auto">
                <i class="far fa-plus-square text-2xl text-green-500 mr-2"></i>
                Agregar Producto
            </a>
        </div>
        <hr class="mt-2 mb-6 max-w-sm">

        

        
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font bold">Agregando Productos</h1>

                <div class="flex items-center mt-4">
                    <Label class="w-32">CATEGORIA:</Label>
                    <select wire:model="selectedcategory" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">Selecciona una opción</option>
                        @foreach ($category_products as $category_product)

                            <option value="{{$category_product->id}}">{{$category_product->name}}</option>
                            
                        @endforeach
                    </select>
                </div>
                @if(!is_null($products))

                <div class="flex items-center mt-4">
                    <Label class="w-32">PRODUCTO:</Label>
                    <select wire:model="selectedproduct" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">--PRODUCTOS--</option>
                                
                        
                        @foreach ($products as $product)
                            
                            @if($pedido->pedidoable_type=="App\Models\Socio")
                                
                                
                                <option value="{{$product->id}}">{{$product->name."  -  $".number_format($product->precio-$product->descuento_socio)}}</option>
                                
                                
                
                            @endif
                            @if($pedido->pedidoable_type=="App\Models\Invitado")
                                
                                
                                    
                                <option value="{{$product->id}}">{{$product->name."  -  $".number_format($product->precio)}}</option>
                
                                   
                               
                
                            @endif

                            
                            
                        @endforeach
                    </select>
                </div>
                
                    @if(!is_null($marcas))

                        @if ($marcas->count())
                            <div class="flex items-center mt-4">
                                <Label class="w-32">MARCA de Diseño:</Label>
                                <select wire:model="selectedmarca" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">--MARCA--</option>
                                    @foreach ($marcas as $marca)
            
                                        <option value="{{$marca->id}}">{{$marca->name}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        @if(!is_null($modelos))

                            <div class="flex items-center mt-4">
                                <Label class="w-32">MODELO:</Label>
                                <select wire:model="modelo_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">--MODELO--</option>
                                    @foreach ($modelos as $modelo)
                                        @if($modelo->category_product_id==$category_id)
            
                                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            
                            
                           

                        @endif

                        @if(!is_null($smartphones))

                            <div class="flex items-center mt-4">
                                <Label class="w-32">SMARTPHONE:</Label>
                                <select wire:model="smartphone_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">-smartphone-</option>
                                    @foreach ($smartphones as $smartphone)
                                        
            
                                            <option value="{{$smartphone->id}}">{{$smartphone->marcasmartphone->name."; ".$smartphone->modelo}}</option>

                                        
                                    @endforeach
                                </select>
                            
                            </div>
                        @endif
                         
                        <div class="flex items-center mt-4">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="name" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">Nro:</label>
                            <input wire:model="numero" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">Detalles:</label>
                            <input wire:model="detalle" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                        </div>
                        
                       



                    @else

                        
                    
                        

                   
                    

                    @endif

                @endif

                <div class="flex justify-end mt-4">
                    <button class="btn btn-danger" x-on:click="open=false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>

                </div>
            </div>
        </article>

        
     
        @foreach ($pedido->ordens->reverse() as $orden)
            <article class="card mt-2">
                <div class="card-body bg-gray-100 flex">

                    <div class="items-center">
                        <label class="mx-4">1</label>
                    </div>

                    <div class="items-center">
                        <label class="mx-4">{{$orden->producto->name}}</label>
                    </div>
                    @if($orden->modelo)

                        <div class="items-center">
                            <label class="mx-4">{{$orden->modelo->marca->name}}</label>
                        </div>
                    
                        <div class="items-center">
                            <label class="mx-4">Mod: {{$orden->modelo->name}}</label>
                        </div>
                    @endif
                    @if($orden->smartphone)
                        <div class="items-center">
                            <div class="text-sm text-gray-900">{{$orden->smartphone->modelo}}</div>
                            <div class="text-sm text-gray-500">{{$orden->smartphone->marcasmartphone->name}}</div>
                        
                        </div>
                    @endif

                    <div class="items-center">
                        <label class="mx-4">Nombre: {{$orden->name}}</label>
                    </div>

                    <div class="items-center">
                        <label class="mx-4">Nro: {{$orden->numero}}</label>
                    </div>
                    
                    


                    @if($pedido->pedidoable_type=="App\Models\Socio")
                        <div class="items-center justify-end ml-auto">
                            <label class="mx-4 ml-6">${{number_format($orden->producto->precio-$orden->producto->descuento_socio)}}</label>
                        </div>
                    @endif
                    @if($pedido->pedidoable_type=="App\Models\Invitado")
                        <div class="items-center justify-end ml-auto">
                            <label class="mx-4 ml-6">${{number_format($orden->producto->precio)}}</label>
                        </div>
                    @endif

                    

                     
                    










                </div>
            </article>
            
        @endforeach
        @if($pedido->ordens->count()>0)
            <div class="flex justify-center">
                                
                <form action="" method="POST">
                    @csrf

                    <button class="btn btn-success justify-center mt-4" type="submit">Finalizar->Pagar</button>
                </form>

            </div>
        @endif
    </div>

</div>
