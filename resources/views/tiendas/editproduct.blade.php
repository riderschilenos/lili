<x-tienda-layout :tienda="$tienda">
  
         <main class="pr-10">
          @livewire('tienda.producto-inteligente',['producto'=>$producto->id])
          <div class="flex justify-end">
            <div class="max-w-7xl">
              <div class="flex justify-end">
                {!! Form::open(['route'=>['producto.skugenerate',$producto] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'POST']) !!}
                  
                  {!! Form::submit('(Gnerar SKU)', ['class'=>'link-button text-center mt-6 text-xs mx-2 text-blue-600 cursor-pointer']) !!}
                    
                {!! Form::close() !!}
              </div>
              <div class="grid grid-cols-3 w-full gap-x-2 mx-6">
               
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
                      

                </div>
                <div class="mx-auto w-full bg-white py-4 px-6 mr-6">
                    
                      <div class="mb-5">
                      <div class="mb-4">
                          {!! Form::label('sku', 'Sku:') !!}
                          {!! Form::text('sku', null , ['class' => 'form-input block w-full mt-1'.($errors->has('comision_invitado')?' border-red-600':''),'step' => '0.5']) !!}
      
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
                  <div class="grid grid-cols-3 w-full gap-x-2 mx-6">
                                        
                    <div class="mx-auto w-full bg-white col-span-2 py-4 px-6">

                          <div class="mb-6 pt-4" >
                            <div class="flex justify-between">
                                <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                Fotos del Producto
                                </label>
                                            
                            </div>
                            <div class="md:flex-1 px-4">
                              <div x-data="{ image: 1 }" x-cloak>
                                <div class="h-80 md:h-92 rounded-lg bg-gray-100 mb-4">
                                  <div x-show="image === 1" class="h-80 md:h-92   rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                      
                                      <div class="flex justify-center">
                                        @if ($producto->image)
                                          <img src="{{Storage::url($producto->image)}}" class="h-80 md:h-92  " alt="">
                                        @else
                                          <img src="https://broxtechnology.com/images/iconos/box.png" class="h-80 md:h-92  " alt="">
                                        @endif
                                          
                                        </div>
                                  </div>
                      
                                  <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                    <span class="text-5xl">2</span>
                                  </div>
                      
                                  <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                    <span class="text-5xl">3</span>
                                  </div>
                      
                                  <div x-show="image === 4" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                    <span class="text-5xl">4</span>
                                  </div>
                                </div>
                      
                                <div class="flex mx-2 mb-4">
                                  <template x-for="i in 4">
                                    <div class="flex-1 px-2">
                                      <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                          <div class="flex justify-center p-3">
                                              <img src="{{Storage::url($producto->image)}}" class="p-2" alt="">
                                          </div>
                                      </button>
                                    </div>
                                  </template>
                                </div>
                              </div>
                            </div>
                            
                            <div class="mb-8">
                              <input type="file" name="file" id="file" class="sr-only" />
                              <label
                                for="file"
                                class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center"
                              >
                                <div>
                                  <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                    Drop files here
                                  </span>
                                  <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                    Or
                                  </span>
                                  <span
                                    class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]"
                                  >
                                    Browse
                                  </span>
                                </div>
                              </label>
                            </div>
                    
                          
                          </div>
                          
          
                          
                          
                        
          
                        
                          
                          

                    </div>
                    <div class="mx-auto w-full bg-white py-4 px-6 mr-6">
                      
                    </div>

                

              </div>
            </div>
          </div>
         </main>

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