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


            @endphp    
            @endforeach

        @endif
        @if($pedido->pedidoable_type=="App\Models\Invitado")
            @foreach ($pedido->ordens as $orden)
            @php
                
                $total+=$orden->producto->precio;

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


    <div class="container">
        <div class="card-header mb-4">
            <h1 class="text-center"><b>${{number_format($total+$totalsuscrip-$comisiones)}}</b></h1>
        </div>
        <div class="row justify-content-md-center">
            <div class="col">
                <h2 class="text-center"><b>${{number_format($total+$totalsuscrip)}}</b></h2>
                <h5 class="text-center">INGRESOS</h5>
                <div class="row justify-content-md-center">
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($total)}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Pagos</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header"><b class="h1">${{number_format($totalsuscrip)}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Ventas en Suscripciones</h5><br>
                            
                        
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
                <h2 class="text-center"><b>${{number_format($comisiones)}}</b></h2>
                <h5 class="text-center">GASTOS</h5>
                <div class="row justify-content-md-center">
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisiones)}}</b></div>
                            <div class="card-header"><b class="h5">+ ${{number_format($comisiones)}} (Pendientes)</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Comisiones</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">$.000</b></div>
                            <div class="card-header"><b class="h5">- $.000 (EXTRAS)</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Gastos generales</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="row justify-content-md-center">
            <div class="col">

                <div class="row justify-content-md-center">
                    
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header"><b class="h1">{{$carcasas}}</b></div>
                            <img src="" alt="">
                        <div class="card-body">
                            
                                <h5 class="card-title">Carcasas</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                   
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header"><b class="h1">{{$llaveros}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Llaveros</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header"><b class="h1">{{$collares}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Collares</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header"><b class="h1">{{$colgantes}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Colgantes</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header"><b class="h1">{{$poleras}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Poleras</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header"><b class="h1">{{$polerones}}</b></div>
                        <div class="card-body">
                            
                                <h5 class="card-title">Polerones</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
</div>
