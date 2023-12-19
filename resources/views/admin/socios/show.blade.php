@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')

@stop

@section('content')

<style>
    .centered-image {
        display: block;
        margin: auto;
        margin-top: 40px; /* Ajusta la distancia del objeto de arriba según lo necesites */
        max-width: 80%; /* Ajusta el ancho máximo de la imagen */
    }
</style>


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="mt-5 object-cover" width="50px" src="{{ $socio->user->profile_photo_url }}">
                
                <span class="font-weight-bold">{{$socio->name}}</span><span class="text-black-50">
                @if ($socio->user)
                    {{$socio->user->email}} 
                @endif
                
                </span><span> </span>
                @isset($socio->foto)

                    <img id="picture" class="h-56 w-100 object-contain object-center mt-8"src="{{Storage::url($socio->foto)}}" alt="">
                @else
                    <img id="picture" class="h-56 w-100 object-contain object-center"src="https://st4.depositphotos.com/5575514/23597/v/600/depositphotos_235978748-stock-illustration-neutral-profile-picture.jpg" alt="">
                    {!! Form::open(['route'=>['socio.fotos',$socio],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                        @csrf
                        {!! Form::file('foto', ['class'=>'form-input w-full'.($errors->has('foto')?' border-red-600':''), 'id'=>'foto','accept'=>'image/*']) !!}
                        {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
                                            
                    {!! Form::close() !!}
                @endif

                @isset($socio->carnet)
                    <img id="picture" class="h-56 w-100 object-contain object-center mt-8"src="{{Storage::url($socio->carnet)}}" alt="">
                @else
                    <img id="picture" class="h-56 w-100 object-contain object-center"src="https://nyc3.digitaloceanspaces.com/archivos/elmauleinforma/wp-content/uploads/2021/02/01141319/Cedula-de-identidad-2.jpg" alt="">
                    {!! Form::open(['route'=>['socio.fotos',$socio],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                        @csrf
                        {!! Form::file('carnet', ['class'=>'form-input w-full'.($errors->has('foto')?' border-red-600':''), 'id'=>'foto','accept'=>'image/*']) !!}
                        {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
                                            
                    {!! Form::close() !!}
                @endisset
                
        
        
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Información de perfil</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Nombre: {{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }} </label><input type="text" class="form-control" placeholder="first name" value=""></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Disciplina: {{$socio->disciplina->name}}</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Fono:  
                    <a  href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=Hola" target="_blank">
                       {{ $socio->fono }}
                    </a> 

                </label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                    <div class="col-md-12"><label class="labels">
                        @if($socio->direccion)
                           {{Str::limit($socio->direccion->comuna.', '.$socio->direccion->region,50)}}
                        @else
                            Sin Dirección
                        @endif    
                    </label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12"><label class="labels">Localidad</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Región</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Ciudad</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">Región</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            
                <!-- Luego, dentro de tu HTML -->
                <img id="picture" class="centered-image" src="{{ Storage::url('qrcodes/'.$socio->slug.'.svg') }}" alt="">
                
                
            

            </div>
        </div>
    </div>
</div>
</div>
</div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop