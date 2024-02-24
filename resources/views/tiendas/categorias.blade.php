<x-tienda-layout :tienda="$tienda">
         <main>
            
            
            <div class="card">
               <div class="card-body">
                   <h1 class="text-2xl font-bold">FORMULARIO CATEGORIAS</h1>
                   <hr class="mt-2 mb-6">
   
                   {!! Form::open(['route'=>'category_products.store','files'=>true , 'autocomplete'=>'off']) !!}
                       
                       {!! Form::hidden('tienda_id',$tienda->id) !!}
   
   
                       <div class="mb-4">
                           {!! Form::label('name', 'Nombre:') !!}
                           {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}

                           @error('name')
                              <strong class="text-xs text-red-600">{{$message}}</strong>
                           @enderror
                     </div>

   
                     
   
                       <div class="flex justify-end">
                           {!! Form::submit('Crear Categoría', ['class'=>'font-bold py-2 px-4 rounded bg-blue-500 text-white cursor-pointer']) !!}
                       </div>
   
                   {!! Form::close() !!}

                   @if ($tienda->categorias)
                       @foreach ($tienda->categorias as $categoria)
                           {{$categoria->name}}<br>
                       @endforeach
                   @endif
                       
               </div>
           </div>

         </main>
</x-tienda-layout>