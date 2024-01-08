<x-tienda-layout :tienda="$tienda">

  @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @endsection
  
         <main class="pr-10">
            @livewire('tienda.producto-inteligente',['producto'=>$producto->id,'tienda'=>$tienda->id])
            <div class="flex justify-end mr-12">
              <div class="max-w-6xl">
                <div class="grid grid-cols-2 md:grid-cols-3 w-full gap-x-2 mx-6 mb-2">
                    <div class="mx-auto w-full col-span-2 px-6" x-data="{alert:true}">
                    </div>
                    <div class="mx-auto w-full col-span-2 md:col-span-1 px-6 mr-6">
                      <div class="flex justify-between">
                        <div>
                          {!! Form::open(['route'=>['producto.skugenerate',$producto] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'POST']) !!}
                            
                            {!! Form::submit('(Gnerar SKU)', ['class'=>'link-button text-center mt-6 text-xs mx-2 text-blue-600 cursor-pointer']) !!}
                              
                          {!! Form::close() !!}
                        </div>
                        @if ($producto->sku)
                            
                        
                          <div>
                            {!! Form::open(['route'=>['producto.printsku',$producto] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'POST' ,'target' => '_blank']) !!}

                            {!! Form::hidden('cantidad', 36 ) !!}
                              
                              {!! Form::submit('Imprimir Etiquetas', ['class'=>'link-button text-center mt-6 text-xs mx-2 text-blue-600 cursor-pointer']) !!}
                                
                            {!! Form::close() !!}
                          </div>
                        @endif  
                      </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 w-full gap-x-2 mx-6">
                    <div class="mx-auto w-full bg-white col-span-2 py-4 px-6" x-data="{alert:true}">
                        @if (session('info'))
                          <div x-show="alert" class="font-regular relative block w-full max-w-screen-md rounded-lg bg-green-500 px-4 py-4 text-base text-white mb-4" data-dismissible="alert">
                              <div class="absolute top-4 left-4">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 24 24"
                                  fill="currentColor"
                                  aria-hidden="true"
                                  class="mt-px h-6 w-6"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                              </div>
                              <div class="ml-8 mr-12">
                                <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-white antialiased">
                                {{session('info')}}
                                </h5>
                              
                              </div>
                              <div data-dismissible-target="alert" x-on:click="alert=false"
                                data-ripple-dark="true"
                                class="absolute top-3 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20" >
                                <div role="button" class="w-max rounded-lg p-1">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12"
                                    ></path>
                                  </svg>
                                </div>
                              </div>
                          </div>
                        @endif
                  
                      {!! Form::model($producto, ['route'=>['producto.update',$producto],'method' => 'POST', 'files'=> true , 'autocomplete'=>'off']) !!}
                      
                      <div class="flex items-center mb-4">
                          {!! Form::label('stock','Stock:') !!}
                          {!! Form::text('stock',null, ['class'=>'ml-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md', 'autofocus'=>'on']) !!}

                          @error('stock')
                            <span class="text-danger ml-2">{{$message}}</span>
                            
                          @enderror

                      </div>
                      <div class="flex items-center">
                            {!! Form::label('name','Nombre') !!}
                            {!! Form::text('name',null, ['class'=>'ml-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md','placeholder'=>'Ingrese el nombre del producto']) !!}
      
                            @error('name')
                              <span class="text-danger ml-2">{{$message}}</span>
                              
                            @enderror
      
                      </div>
                      <div class="my-4 flex items-center">
                            {!! Form::label('category_product_id', 'Categoria:') !!}
                            {!! Form::select('category_product_id', $category_products, null , ['class'=>'w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md ml-2']) !!}
                          
                      </div>
                        
                        <div class="mb-4">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textarea('descripcion', null , ['class' => 'w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md mt-1']) !!}
                            
                            @error('descripcion')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="mb-6" >
                          <div class="flex justify-between">
                             <label class=" block text-xl font-semibold text-[#07074D]">
                             Foto del producto
                             </label>
                                        
                          </div>
  
                          {!! Form::file('file', ['class'=>'form-input w-full mt-6'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                                              
                          
  
                       
                        </div>

                    </div>
                    <div class="mx-auto w-full col-span-2 md:col-span-1 bg-white py-4 px-6 mr-6">
                        
                          <div class="mb-5">
                          <div class="mb-4">
                          
                          

      
                              {!! Form::label('sku', 'Sku:') !!}
                              {!! Form::text('sku', null , ['class' => 'form-input block w-full mt-1'.($errors->has('comision_invitado')?' border-red-600':''),'step' => '0.5']) !!}
                              @if ($producto->sku)
                                <div class="flex justify-center mt-4">
                                  <img class="w-full" src="data:image/png;base64,{{DNS1D::getBarcodePNG($producto->sku, 'C39',2,70,array(1,1,1), true)}}" alt="barcode"   />
                                </div>
                              @endif  
                              @error('sku')
                                  <strong class="text-xs text-red-600">{{$message}}</strong>
                              @enderror
                          </div>
                          <div class="mb-4">
                              {!! Form::label('precio', 'Precio:') !!}
                              {!! Form::number('precio', null , ['class' => 'form-input block w-full mt-1'.($errors->has('precio')?' border-red-600':''),'step' => '0.5']) !!}
          
                              @error('precio')
                                  <strong class="text-xs text-red-600">{{$message}}</strong>
                              @enderror
                          </div>
                          <div class="mb-4">
                            {!! Form::label('costo', 'Costo:') !!}
                            {!! Form::number('costo', null , ['class' => 'form-input block w-full mt-1'.($errors->has('costo')?' border-red-600':''),'step' => '0.5']) !!}
        
                            @error('costo')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                          </div>
                          <div class="mb-4">
                            {!! Form::label('disciplina_id', 'Disciplina') !!}
                            {!! Form::select('disciplina_id', $disciplinas, $tienda->disciplina_id , ['class'=>'form-input block w-full mt-1']) !!}
                        </div>
                        <div class="mb-4">
                            {!! Form::label('personalizable', 'Personalizable') !!}
                            <div class="flex items-center mt-1">
                                <label class="inline-flex items-center mr-4">
                                    {!! Form::radio('personalizable', 'si', $tienda->disciplina_id == 'si', ['class'=>'form-radio']) !!}
                                    <span class="ml-2">Sí</span>
                                </label>
                                <label class="inline-flex items-center">
                                    {!! Form::radio('personalizable', 'no', $tienda->disciplina_id == 'no', ['class'=>'form-radio']) !!}
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                        </div>
                    
                    
                    
                          <div>
                            {!! Form::submit('Actualizar Producto', ['class'=>'hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none']) !!}
                    
                          </div>
                          {!! Form::close() !!}

                          

                        
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 w-full gap-x-2 mx-6">
                    <div class="mx-auto w-full bg-white col-span-2 py-4 px-6">

                            <div class="mb-6 pt-4" >
                              <div class="flex justify-between">
                                  <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                  Carga masiva de fotos
                                  </label>
                                              
                              </div>
                              <form action="{{route('admin.productos.upload',$producto)}}"
                                  method="POST"
                                  class="dropzone"
                                  id="my-awesome-dropzone">
                                  <div class="dz-message " data-dz-message>
                                    <h1 class="text-xl font-bold">Seleccione Imágenes</h1>
                                    <span>Utiliza fotos sacadas de dia donde puedas mostrar todos los detalles importantes de tu Vehiculo</span>
                                  </div>
                              </form>

                              @livewire('tienda.producto-image', ['producto_id' => $producto->id])
                             
                              
                              <div class="mb-8">
                              
                              </div>
                      
                            
                            </div>
                            
            
                            
                            
                          
            
                          
                            
                            

                    </div>
                    <div class="mx-auto w-full col-span-2 md:col-span-1 bg-white py-4 px-6 mr-6">
                    </div>
                </div>
              </div>
            </div>
         </main>
     
         <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
         <script>
           
           Dropzone.options.myGreatDropzone = { // camelized version of the `id`
             headers:{
               'X-CSRF-TOKEN' : "{!! csrf_token() !!}"
             },
             acceptedFiles: "image/*",
             maxFiles: 6,
             
     
               
               };
              
               
           
         </script>

        <x-slot name="js">
         
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
           <script>
                              
                  ClassicEditor
                  .create(document.querySelector('#descripcion'), {
                      toolbar: {
                          items: [
                              'heading',
                              '|',
                              'bold',
                              'italic',
                              'underline',
                              'strikethrough',
                              'link',
                              '|',
                              'bulletedList',
                              'numberedList',
                              'todoList',
                              '|',
                              'outdent',
                              'indent',
                              '|',
                              'alignment',
                              'fontBackgroundColor',
                              'fontColor',
                              'fontSize',
                              'fontFamily',
                              '|',
                              'highlight',
                              'subscript',
                              'superscript',
                              'removeFormat',
                              'code',
                              'codeBlock',
                              '|',
                              'imageInsert',
                              'blockQuote',
                              'insertTable',
                              'mediaEmbed',
                              'pageBreak',
                              '|',
                              'undo',
                              'redo',
                              '|',
                              'horizontalLine',
                              'htmlEmbed',
                              'MathType',
                              '|',
                              'exportPdf',
                              'exportWord',
                              'exportHtml',
                              '|',
                              'find',
                              'selectAll',
                              'sourceEditing',
                              '|',
                              'undo',
                              'redo'
                          ],
                          shouldNotGroupWhenFull: true
                      },
                      language: 'es',
                      image: {
                          toolbar: [
                              'imageTextAlternative',
                              'imageStyle:full',
                              'imageStyle:side',
                              '|',
                              'imageResize',
                              'imageResize:50',
                              'imageResize:75',
                              '|',
                              'imageTextAlternative'
                          ]
                      },
                      table: {
                          contentToolbar: [
                              'tableColumn',
                              'tableRow',
                              'mergeTableCells',
                              'tableProperties',
                              'tableCellProperties'
                          ]
                      },
                      licenseKey: '',
                  })
                  .catch(error => {
                      console.error(error);
                  });
           </script>
        </x-slot>

</x-tienda-layout>