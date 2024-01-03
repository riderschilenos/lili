<x-tienda-layout :tienda="$tienda">
         <main class="pr-10">
           
            <div class="grid grid-cols-3 w-full gap-x-2 m-6">
                                
               <div class="mx-auto w-full bg-white col-span-2 py-4 px-6">
                <h1 class="font-bold text-2xl mb-4">Crear Nuevo Producto</h1>

                  {!! Form::open(['route'=>'admin.products.store', 'autocomplete'=>'off', 'files'=> true ]) !!}

                  {!! Form::hidden('creacion', 1 ) !!}
                  {!! Form::hidden('tienda_id', $tienda->id ) !!}
                     <div class="flex items-center">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name',null, ['class'=>'ml-2 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md','placeholder'=>'Ingrese el nombre del producto', 'autofocus'=>'on']) !!}
   
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
      
                     <div class="mb-6 pt-4" >
                        <div class="flex justify-between">
                           <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                           Fotos del Producto
                           </label>
                           <div>
                              <a rel="noopener noreferrer" href="{{route('tiendas.productos',$tienda)}}"><button class="focus-visible:ring-ring ring-offset-background inline-flex h-10 items-center justify-center rounded-md bg-[#248046] px-4 py-2 text-sm font-medium text-[#e9ffec] transition-colors hover:bg-[#1a6334] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">SUBIR FOTOS</button></a>
                           </div>                
                        </div>

                        <div class="mb-8 hidden">
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
                  
                    <div class="mb-5">
                     <div class="mb-4">
                        {!! Form::label('sku', 'Sku:') !!}
                        @if (session('sku'))
                            {!! Form::number('sku', session('sku') , ['class' => 'form-input block w-full mt-1'.($errors->has('comision_invitado')?' border-red-600':''),'step' => '0.5']) !!}
                        @else
                            {!! Form::number('sku', null , ['class' => 'form-input block w-full mt-1'.($errors->has('comision_invitado')?' border-red-600':''),'step' => '0.5']) !!}
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
                      {!! Form::submit('Crear Producto', ['class'=>'hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none']) !!}
                      {!! Form::close() !!}
                    </div>
                  </form>
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