<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nonbre">
        </div>

        @if ($pedidos->count())
            
      
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Captador</th>
                        <th>Transportista</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Subtotal</th>
                        <th></th>

                    </thead>
                    
                    <tbody>
                        @foreach ($pedidos->reverse() as $pedido)
                            <tr>
                                <td>{{$pedido->id}}</td>
                                <td>{{$pedido->vendedor->name}}</td>
                                <td>{{$pedido->transportista->name}}</td>
                                <td>
                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                    @foreach ($socios as $socio)
                                            
                                            @if($socio->id == $pedido->pedidoable_id)
                                                {{$socio->user->name}}
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Socio
                                                </span>
                                            @endif
                                    @endforeach
                                    @endif
                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                        @foreach ($invitados as $invitado)
                                                
                                                @if($invitado->id == $pedido->pedidoable_id)
                                                    {{$invitado->name}} <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        Invitado
                                                    </span>
                                                @endif
                                        @endforeach
                                    @endif
                                </td>

                                @php
                                $subtotal=0;
                                @endphp

                                @if($pedido->pedidoable_type=="App\Models\Socio")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->precio-$orden->producto->comision_invitado;

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

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{$pedido->created_at->format('l')}}</div>
                                    <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 ml-3">${{number_format($subtotal)}}</div>
                                    
                                </td>


                                
                                <td width="10px">
                                    <a class="btn btn-primary" href="">Editar</a>
                                </td>
                            </tr>
                            
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$pedidos->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros que coincidan</strong>
            </div>
       

        @endif
    </div>
</div>
