<div>
    @php
    $total=0;
    $total7=0;
    $total30=0;
    
    $gast7=0;
    $gast30=0;

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

    $pendienteventas=0;
    $pendientediseño=0;
    $pendienteproduccion=0;

    $compracarcasas=0;
    $gastosgenerales=0;
    @endphp

    @foreach ($pedidos as $pedido)
        
        @if($pedido->pedidoable_type=="App\Models\Socio")
            @foreach ($pedido->ordens as $orden)
            @php


                if($orden->producto->id==1 || $orden->producto->id==2 || $orden->producto->id==3 || $orden->producto->id==7  || $orden->producto->id==21){
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
                elseif($orden->producto->id==13  || $orden->producto->id==14  || $orden->producto->id==19 || $orden->producto->id==21){
                    
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


                if($orden->producto->id==1 || $orden->producto->id==2 || $orden->producto->id==3|| $orden->producto->id==7  || $orden->producto->id==21){
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
                elseif($orden->producto->id==13  || $orden->producto->id==14 || $orden->producto->id==11 || $orden->producto->id==12  || $orden->producto->id==19 || $orden->producto->id==21){
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

    @foreach ($pagos as $pago)
        @php
               $total+=$pago->cantidad;
        @endphp
    @endforeach
    @foreach ($pagos7 as $pago)
        @php
               $total7+=$pago->cantidad;
        @endphp
    @endforeach
    @foreach ($pagos30 as $pago)
        @php
               $total30+=$pago->cantidad;
        @endphp
    @endforeach

    @foreach ($gastos7 as $gasto)
        @php
           
                $gast7+=$gasto->cantidad;   
                
        @endphp
    @endforeach
    @foreach ($gastos30 as $gasto)
        @php
           
                $gast30+=$gasto->cantidad;   
                
        @endphp
    @endforeach

    @foreach ($gastos as $gasto)
        @php
                if($gasto->gastotype_id==1){
                    $comisionventas+=$gasto->cantidad;   
                    if($gasto->estado==1){
                        $pendienteventas+=$gasto->cantidad;
                    }
                }
                elseif($gasto->gastotype_id==2){
                    $comisiondiseño+=$gasto->cantidad;
                    if($gasto->estado==1){
                        $pendientediseño+=$gasto->cantidad;
                    }
                }
                elseif($gasto->gastotype_id==3){
                    $comisionproduccion+=$gasto->cantidad;
                    if($gasto->estado==1){
                        $pendienteproduccion+=$gasto->cantidad;
                    }
                }
                elseif($gasto->gastotype_id==4){
                    $compracarcasas+=$gasto->cantidad;
                }
                elseif($gasto->gastotype_id>4){
                    $gastosgenerales+=$gasto->cantidad;
                }
        
        @endphp
    @endforeach

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
    

    <figure class="highcharts-figure">
        <div id="grafico"></div>
    </figure>
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
                
    <div class="container">
        <div class="card-header mb-4">
            <h1 class="text-center"><b>${{number_format($total+$totalsuscrip-($comisionventas+$comisiondiseño+$comisionproduccion+$compracarcasas+$gastosgenerales))}}</b></h1>

            <h3 class="block sm:hidden text-center">SEM: <b class="mr-4">${{number_format($total7-($gast7))}}</b> <br >MES: <b>${{number_format($total30-($gast30))}}</b></h3>
        
        </div>
        <div class="row justify-content-md-center">
            <div class="col">
                <h2 class="text-center"><b>${{number_format($total+$totalsuscrip)}}</b></h2>
                <h5 class="block sm:hidden text-center">SEM: <b class="mr-4">${{number_format($total7)}}</b> <br >MES: <b>${{number_format($total30)}}</b></h5>
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
                <h2 class="text-center"><b>${{number_format($comisionventas+$comisiondiseño+$comisionproduccion+$compracarcasas+$gastosgenerales)}}</b></h2>
                <h5 class="block sm:hidden text-center">SEM: <b class="mr-4">${{number_format($gast7)}}</b> <br >MES: <b>${{number_format($gast30)}}</b></h5>
                <h5 class="text-center">GASTOS</h5>
                <div class="row justify-content-md-center">
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisionventas)}}</b></div>
                            @if ($pendienteventas>0)
                                <div class="card-header"><b class="h5">- ${{number_format($pendienteventas)}} (Pendientes)</b></div>
                            @endif
                            
                        <div class="card-body">
                            
                                <h5 class="card-title">Comisiones en ventas</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisiondiseño)}}</b></div>
                            @if ($pendientediseño>0)
                                <div class="card-header"><b class="h5">- ${{number_format($pendientediseño)}} (Pendientes)</b></div>
                            @endif
                        <div class="card-body">
                            
                                <h5 class="card-title">Comisiones en diseño</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisionproduccion)}}</b></div>
                            @if ($pendienteproduccion>0)
                                <div class="card-header"><b class="h5">- ${{number_format($pendienteproduccion)}} (Pendientes)</b></div>
                            @endif
                        <div class="card-body">
                            
                                <h5 class="card-title">Comisiones en producción</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($compracarcasas)}}</b></div>
                            <div class="card-header"><b class="h5"> {{-- comment- $.000 (EXTRAS)--}}</b></div> 
                        <div class="card-body">
                            
                                <h5 class="card-title">Carcasas</h5><br>
                            
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-title px-2 pt-2"><b class="h1">${{number_format($gastosgenerales)}}</b></div>
                           <div class="card-header"><b class="h5"> {{-- comment- $.000 (EXTRAS)--}}</b></div> 
                        <div class="card-body">
                            
                            <a href="{{route('admin.gastos.create')}}" class="text-white"><h5 class="card-title">Gastos generales</h5></a><br>
                            
                        
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
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center"><b class="h1">{{$vendedors->count()}}</b></div>
                        <div class="card-body">
                            
                                <a href="{{route('admin.vendedors.index')}}" class="text-white"><h5 class="card-title mx-auto">Vendedores</h5></a><br>
                            
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
    @foreach ($suscripcion28 as $suscripcion)

        {{$suscripcion->precio."el dia ".$suscripcion->created_at->format('d-m-Y')}} <br>
        
    @endforeach
 



    @php
        $meses_letter=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agostro','Septiembre','Octubre','Noviembre','Diciembre'];
        $final_anual=$now->format('n')+12;
        $inicio_anual=$now->format('n')+1;

        $meses=[];
        $meses_serie=[];

        foreach (range($inicio_anual,($final_anual)) as $number) {
            
                if($number>12){
                $nro=($number- 12);
                }else{
                $nro=$number;
                }  
            $meses[]=$nro;
            $meses_serie[]=$meses_letter[$nro-1];
            }
        
        $ventas_anual=[];
            foreach ($meses as $mes) {
                $totalmes=0;
                foreach ($pagos_anual as $pago) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmes+=$pago->cantidad;
                    }
                        
                    
                }
            $ventas_anual[]=$totalmes;
            }

        $gast_anual=[];
        foreach ($meses as $mes) {
                $totalmes=0;
                foreach ($gastos_anual as $pago) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmes+=$pago->cantidad;
                    }
                        
                    
                }
            $gast_anual[]=$totalmes;
            }


        $final=$now->format('d')+date('t', strtotime($now."- 1 month"));
        $inicio=$now->format('d')+1;
        $dias=[];

        foreach (range($inicio,($final)) as $number) {
              
                if($number>date('t', strtotime($now."- 1 month"))){
                   $nro=($number- date('t', strtotime($now."- 1 month")));
                }else{
                   $nro=$number;
                }  
               $dias[]=$nro;
            }
        

        $ventas=[];
        foreach ($dias as $day) {
            $totaldia=0;
            foreach ($pagos30 as $pago) {
                if (intval($pago->created_at->format('d')) == $day) {
                    $totaldia+=$pago->cantidad;
                }
            }
            foreach ($suscripcion28 as $suscripcion){
                if (intval($suscripcion->created_at->format('d')) == $day) {
                    $totaldia+=$suscripcion->precio;
                }
                

            }
       
            $ventas[]=$totaldia;
            }

        $gastos=[];
        foreach ($dias as $day) {
            $totaldia=0;
            foreach ($gastos30 as $pago) {
                if (intval($pago->created_at->format('d')) == $day) {
                    $totaldia+=$pago->cantidad;
                }
            }
            $gastos[]=$totaldia;
            }



        //$ventas =[43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175];
       // $gastos =[24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434];
        
    @endphp


    <script>
        var ventas = <?php echo json_encode($ventas) ?>;
        var ventas_anual = <?php echo json_encode($ventas_anual) ?>;
        var dias = <?php echo json_encode($dias) ?>;
        var meses = <?php echo json_encode($meses_serie) ?>;
        var gastos = <?php echo json_encode($gastos) ?>;
        var gastos_anual = <?php echo json_encode($gast_anual) ?>;
        var now = <?php echo intval($pago->created_at->format('d'))?>;

        Highcharts.chart('grafico', {
            chart: {
                    type: 'areaspline'
                },
            
            title: {
                        text: 'Venta - Gastos Ultimos 30 Días'},
                       
            yAxis: {
                title: {
                    text: 'Pesos Chilenos'
                }
                                },

            xAxis: {
                    categories: dias
                    },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                
            },

            series: [{
                name: 'Ventas',
                data: ventas
            }, {
                name: 'Gastos',
                data: gastos
            } ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

            });
            Highcharts.chart('container', {
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'Venta - Gastos Ultimos 12 Meses'
                },
               
                xAxis: {
                    categories: meses
                    },

                legend: {
                    layout: 'vertical',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 150,
                    y: 60,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    }
                },
                plotOptions: {
                 
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Ventas',
                    data: ventas_anual
                }, {
                    name: 'Gastos',
                    data: gastos_anual
                }]
            });
                        
    </script>
</div>
