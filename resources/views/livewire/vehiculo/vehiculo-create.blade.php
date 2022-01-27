<div>
    

        <div class="flex justify-center mt-4">



            <div class="flex items-center mt-4">
                <Label class="w-80">Tipo de Vehiculo:</Label>
                <select wire:model="selectedvehiculotype" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Selecciona una opción</option>
                    @foreach ($vehiculo_types as $vehiculo_type)
        
                        <option value="{{$vehiculo_type->id}}">{{$vehiculo_type->name}}</option>
                        
                    @endforeach
                </select>
            </div>

        </div>
      
            @if(!is_null($marcas))
            
                
                {!! Form::open(['route'=>'garage.vehiculo.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                    @csrf

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8 mt-6">

                        <div class="flex items-center mt-4">
                            <Label class="w-80">Marca:</Label>
                            <select wire:model="selectedmarca" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">--Marca--</option>
                                        
                                
                                @foreach ($marcas as $marca)
                                    

                                    <option value="{{$marca->id}}">{{$marca->name}}</option>
                
                                    
                                    
                                @endforeach

                            </select>
                        </div>
                        
                        @if($selecteddisciplina==1)
                            @include('vehiculo.usados.partials.formmoto')
                        @elseif($selecteddisciplina==2)
                            @include('vehiculo.usados.partials.formbici')
                        @endif


                {!! Form::close() !!}

                


                <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
                <script>
                    
                    ClassicEditor
                    .create( document.querySelector( '#descripcion' ), {
                            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote', 'undo', 'redo', 'numberedList', 'bulletedList'  ],
                            heading: {
                            options: [
                                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                                ]
                            }
                        } )
                        .catch( error => {
                            console.log( error );
                            } );
                            
                                //Cambiar imagen

                    document.getElementById("file").addEventListener('change', cambiarImagen);

                    function cambiarImagen(event){
                        var file = event.target.files[0];

                        var reader = new FileReader();
                        reader.onload = (event) => {
                            document.getElementById("picture").setAttribute('src', event.target.result); 
                        };

                        reader.readAsDataURL(file);

                    
}
                </script>
            

            @endif
        
        
     

</div>
