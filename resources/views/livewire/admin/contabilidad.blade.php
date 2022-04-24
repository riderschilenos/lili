<div>
    @php
    $total=0;

    $comisiones=0;

    $comisionespagadas=0;

    $totalsuscrip=0; //ingresos por suscripcion

    $carcasas=0;
    $llaveros=0;
    $collares=0;
    $colgantes=0;
    $poleras=0;
    $polerones=0;
    $stickers=0;


    //gastos

    $comisionventas=0;
    $comisiondiseño=0;
    $comisionproduccion=0;
    @endphp

    @foreach ($pedidos as $pedido)
        
        @if($pedido->pedidoable_type=="App\Models\Socio")
            @foreach ($pedido->ordens as $orden)
            @php
                
                $total+=$orden->producto->precio-$orden->producto->descuento_socio;

                if($orden->producto->id==1 || $orden->producto->id==2 || $orden->producto->id==3|| $orden->producto->id==7){
                $carcasas+=1;   }
                elseif($orden->producto->id==4){
                    $llaveros+=1; 
                }
                elseif($orden->producto->id==10){
                    $collares+=1; 
                }
                elseif($orden->producto->id==8){
                    $colgantes+=1; 
                }
                elseif($orden->producto->id==5 || $orden->producto->id==6){
                    $poleras+=1; 
                }
                elseif($orden->producto->id==13){
                    $polerones+=1; 
                }
                elseif($orden->producto->id==9){
                    $stickers+=1; 
                }


            @endphp    
            @endforeach

        @endif
        @if($pedido->pedidoable_type=="App\Models\Invitado")
            @foreach ($pedido->ordens as $orden)
            @php
                
                $total+=$orden->producto->precio;

                if($orden->producto->id==1 || $orden->producto->id==2 || $orden->producto->id==3|| $orden->producto->id==7){
                $carcasas+=1;   }
                elseif($orden->producto->id==4){
                    $llaveros+=1; 
                }
                elseif($orden->producto->id==10){
                    $collares+=1; 
                }
                elseif($orden->producto->id==8){
                    $colgantes+=1; 
                }
                elseif($orden->producto->id==5 || $orden->producto->id==6){
                    $poleras+=1; 
                }
                elseif($orden->producto->id==13){
                    $polerones+=1; 
                }
                elseif($orden->producto->id==9){
                    $stickers+=1; 
                }
                

            @endphp    
            @endforeach

        @endif

        @if($pedido->pedidoable_type=="App\Models\Socio")
            @foreach ($pedido->ordens as $orden)
             

            @if($pedido->status==9)
                @php
                    $comisionespagadas+=$orden->producto->comision_socio;
                @endphp   

            @else
                @php
                    $comisiones+=$orden->producto->comision_socio;
                @endphp   
            @endif

            @endforeach

        @endif
        @if($pedido->pedidoable_type=="App\Models\Invitado")
            @foreach ($pedido->ordens as $orden)
            
            @if($pedido->status==8)
                @php  
                    $comisionespagadas+=$orden->producto->comision_invitado;
                @endphp     

            @else
                @php  
                    $comisiones+=$orden->producto->comision_invitado;
                @endphp  
            @endif  
            @endforeach

        @endif

    @endforeach

    @foreach ($suscripcions as $suscripcion)
        @php
            $totalsuscrip+=$suscripcion->precio;
        @endphp
       
        
    @endforeach

    @foreach ($gastos as $gasto)
        @php
            if($gasto->gastotype_id==1){
                $comisionventas+=$gasto->cantidad;   }
                elseif($gasto->gastotype_id==2){
                    $comisiondiseño+=$gasto->cantidad;
                }
                elseif($gasto->gastotype_id==3){
                    $comisionproduccion+=$gasto->cantidad;
                }
        @endphp
    @endforeach


    <div class="container">
        <div class="card-header mb-4">
            <h1 class="text-center"><b>${{number_format($total+$totalsuscrip-$comisiones)}}</b></h1>
        </div>
        <div class="row justify-content-md-center">
            <div class="col">
                <h2 class="text-center"><b>${{number_format($total+$totalsuscrip)}}</b></h2>
                <h5 class="text-center">INGRESOS</h5>
                <div class="row justify-content-md-center">
                    <div class="mx-auto" min-width="80%">
                        <div class="card text-white bg-success mb-3" style="min-width: 16rem;">
                            <div class="card-header text-center"><b class="h1">${{number_format($total)}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title text-center">Ventas en Productos</h5>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="mx-auto" min-width="80%">
                        <div class="card text-white bg-success mb-3" style="min-width: 16rem;">
                            <div class="card-header text-center"><b class="h1">${{number_format($totalsuscrip)}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title text-center">Ventas en Suscripciones</h5>
                            
                        
                        </div>
                        </div>
                    </div>
                    {{-- comment
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header"><b class="h1">$253.000</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Ticketera RCH</h5><br>
                            
                        
                        </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col">
                <h2 class="text-center"><b>${{number_format($comisiones+$comisionespagadas)}}</b></h2>
                <h5 class="text-center">GASTOS</h5>
                <div class="row justify-content-md-center">
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisionventas)}}</b></div>
                            <div class="card-header"><b class="h5">+ ${{number_format($comisiones-$comisionespagadas)}} (Pendientes)</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Comisiones en ventas</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisiondiseño)}}</b></div>
                            <div class="card-header"><b class="h5">+ ${{number_format($comisiones-$comisionespagadas)}} (Pendientes)</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Comisiones en diseño</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisionproduccion)}}</b></div>
                            <div class="card-header"><b class="h5">+ ${{number_format($comisiones-$comisionespagadas)}} (Pendientes)</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Comisiones en producción</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisionespagadas)}}</b></div>
                           <div class="card-header"><b class="h5"> {{-- comment- $.000 (EXTRAS)--}}</b></div> 
                        <div class="card-body">
                            
                                <h5 class="card-title">Gastos generales</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="card-header mb-4">
            <h3 class="text-center"><b>Ventas por Producto</b></h3>
        </div>
        <div class="row justify-content-md-center">
            <div class="col">

                <div class="row justify-content-md-center">
                    
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center"><b class="h1">{{$carcasas}}</b></div>
                            <img src="" alt="">
                            <div class="card-body">
                                
                                    <h5 class="card-title mx-auto">Carcasas</h5><br>
                                
                            
                            </div>
                        </div>
                    </div>
                   
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center"><b class="h1">{{$llaveros}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title mx-auto">Llaveros</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center"><b class="h1">{{$collares}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title mx-auto">Collares</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center"><b class="h1">{{$colgantes}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title mx-auto">Colgantes</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center"><b class="h1">{{$poleras}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title mx-auto">Poleras</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center"><b class="h1">{{$polerones}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title mx-auto">Polerones</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center"><b class="h1">{{$stickers}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title mx-auto">Styckers</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
</div>
