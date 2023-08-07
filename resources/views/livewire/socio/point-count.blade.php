<div>
    @php
    $total=0;
    @endphp
     @foreach ($socio->pedidos->reverse() as $pedido)
                                               
        @if ($pedido->status>=4)
            
        
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
            @php
                $total+=$subtotal;
            @endphp
        @endif
    @endforeach
    @foreach ($invitados as $invitado)
    
        @foreach ($invitado->pedidos->reverse() as $pedido)
         
            @if ($pedido->status>=4)
        
                @php
                $subtotal=0;
                @endphp

                    @foreach ($pedido->ordens as $orden)
                        @php
                            
                            $subtotal+=$orden->producto->precio;

                        @endphp    
                    @endforeach

                @php
                        $total+=$subtotal;
                @endphp
            @endif
        @endforeach
    @endforeach

    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
        TIENES {{$total*0.01+100}} PUNTOS
    </span>

</div>
