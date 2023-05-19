<div>

   <div class="mt-2 sm:mt-4 mb-4 w-full grid grid-cols-3 md:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-2 items-center content-center">
  
      @foreach ($diseños as $diseño)

         <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1  cursor-pointer" wire:click="set_cliente({{$diseño->id}})">
            <div class="relative md:flex items-center">
               <div class="relative">
                  <span class="absolute text-green-500 right-0 bottom-0">
                     <svg width="20" height="20">
                        <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                     </svg>
                  </span>
                  <div class="flex justify-center">
                     <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                  </div>
               </div>
               <div class="flex flex-col">
                  <div class="text-md mt-1 flex items-center">
                     <span class="text-gray-700 mr-3">
                        @if($diseño->pedidoable_type=='App\Models\Socio')
                              @foreach ($socios as $socio)
                                    @if($socio->id == $diseño->pedidoable_id)
                                             {{$socio->user->name}}
                                    @endif
                              @endforeach
                        @endif
                        @if($diseño->pedidoable_type=='App\Models\Invitado')
                              @foreach ($invitados as $invitado)
                                    @if($invitado->id == $diseño->pedidoable_id)
                                          {{$invitado->name}} 
                                    @endif
                              @endforeach
                        @endif
                     </span>
                  </div>
                  <span class="text-base text-gray-600">Pendiente de Diseño</span>
               </div>
            </div>
         </div>
      @endforeach
      @foreach ($produccion as $diseño)

         <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1  cursor-pointer" wire:click="set_cliente({{$diseño->id}})">
            <div class="relative flex items-center space-x-4">
               <div class="relative">
                  <span class="absolute text-green-500 right-0 bottom-0">
                     <svg width="20" height="20">
                        <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                     </svg>
                  </span>
               <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
               </div>
               <div class="flex flex-col leading-tight">
                  <div class="text-md mt-1 flex items-center">
                     <span class="text-gray-700 mr-3">
                        @if($diseño->pedidoable_type=='App\Models\Socio')
                              @foreach ($socios as $socio)
                                    @if($socio->id == $diseño->pedidoable_id)
                                             {{$socio->user->name}}
                                    @endif
                              @endforeach
                        @endif
                        @if($diseño->pedidoable_type=='App\Models\Invitado')
                              @foreach ($invitados as $invitado)
                                    @if($invitado->id == $diseño->pedidoable_id)
                                          {{$invitado->name}} 
                                    @endif
                              @endforeach
                        @endif
                     </span>
                  </div>
                  <span class="text-base text-gray-600">Pendiente de Diseño</span>
               </div>
            </div>
         </div>
      @endforeach
      @foreach ($despacho as $diseño)

         <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1  cursor-pointer" wire:click="set_cliente({{$diseño->id}})">
            <div class="relative flex items-center space-x-4">
               <div class="relative">
                  <span class="absolute text-green-500 right-0 bottom-0">
                     <svg width="20" height="20">
                        <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                     </svg>
                  </span>
               <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
               </div>
               <div class="flex flex-col leading-tight">
                  <div class="text-md mt-1 flex items-center">
                     <span class="text-gray-700 mr-3">
                        @if($diseño->pedidoable_type=='App\Models\Socio')
                              @foreach ($socios as $socio)
                                    @if($socio->id == $diseño->pedidoable_id)
                                             {{$socio->user->name}}
                                    @endif
                              @endforeach
                        @endif
                        @if($diseño->pedidoable_type=='App\Models\Invitado')
                              @foreach ($invitados as $invitado)
                                    @if($invitado->id == $diseño->pedidoable_id)
                                          {{$invitado->name}} 
                                    @endif
                              @endforeach
                        @endif
                     </span>
                  </div>
                  <span class="text-base text-gray-600">Pendiente de Diseño</span>
               </div>
            </div>
         </div>
      @endforeach
        
     


</div>
   @if ($cliente)
      <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
            <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
            <div class="relative flex items-center space-x-4">
               <div class="relative">
                  <span class="absolute text-green-500 right-0 bottom-0">
                     <svg width="20" height="20">
                        <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                     </svg>
                  </span>
               <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
               </div>
               <div class="flex flex-col leading-tight">
                  <div class="text-2xl mt-1 flex items-center">
                     <span class="text-gray-700 mr-3">Anderson Vanhron</span>
                  </div>
                  <span class="text-lg text-gray-600">Junior Developer</span>
               </div>
            </div>
            <div class="flex items-center space-x-2">
               <button type="button" class="inline-flex items-center justify-center rounded-lg border h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
               </button>
               <button type="button" class="inline-flex items-center justify-center rounded-lg border h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                  </svg>
               </button>
               <button type="button" class="inline-flex items-center justify-center rounded-lg border h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                  </svg>
               </button>
            </div>
         </div>
         <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
            <div class="chat-message">
               <div class="flex items-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">Can be verified on any platform using docker</span></div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
               </div>
            </div>
            <div class="chat-message">
               <div class="flex items-end justify-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-300 text-gray-600 ">Your error message says permission denied, npm global installs must be given root privileges.</span></div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
               </div>
            </div>
            <div class="chat-message">
               <div class="flex items-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                     <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">Command was run with root privileges. I'm sure about that.</span></div>
                     <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">I've update the description so it's more obviously now</span></div>
                     <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">FYI https://askubuntu.com/a/700266/510172</span></div>
                     <div>
                        <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                           Check the line above (it ends with a # so, I'm running it as root )
                           <pre># npm install -g @vue/devtools</pre>
                        </span>
                     </div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
               </div>
            </div>
            <div class="chat-message">
               <div class="flex items-end justify-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-300 text-gray-600 ">Any updates on this issue? I'm getting the same error when trying to install devtools. Thanks</span></div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
               </div>
            </div>
            <div class="chat-message">
               <div class="flex items-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">Thanks for your message David. I thought I'm alone with this issue. Please, ? the issue to support it :)</span></div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
               </div>
            </div>
            <div class="chat-message">
               <div class="flex items-end justify-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                     <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600 ">Are you using sudo?</span></div>
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-300 text-gray-600 ">Run this command sudo chown -R `whoami` /Users/Gonzalo Peñaloza/.npm-global/ then install the package globally without using sudo</span></div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
               </div>
            </div>
            <div class="chat-message">
               <div class="flex items-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                     <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">It seems like you are from Mac OS world. There is no /Users/ folder on linux ?</span></div>
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">I have no issue with any other packages installed with root permission globally.</span></div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
               </div>
            </div>
            <div class="chat-message">
               <div class="flex items-end justify-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-300 text-gray-600 ">yes, I have a mac. I never had issues with root permission as well, but this helped me to solve the problem</span></div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
               </div>
            </div>
            <div class="chat-message">
               <div class="flex items-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                     <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">I get the same error on Arch Linux (also with sudo)</span></div>
                     <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">I also have this issue, Here is what I was doing until now: #1076</span></div>
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">even i am facing</span></div>
                  </div>
                  <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
               </div>
            </div>
         </div>
         <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
            <div class="relative flex">
            
               <input type="text" placeholder="Escribe tu Mensaje!" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
               <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                  <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                     </svg>
                  </button>
                  <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                     </svg>
                  </button>
                  <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                  </button>
                  <button type="button" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-gray-600 bg-blue-500 hover:bg-blue-400 focus:outline-none">
                     <span class="font-bold">Enviar</span>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                     </svg>
                  </button>
               </div>
            </div>
         </div>
      </div>
   @endif
  
   
   <style>
      .scrollbar-w-2::-webkit-scrollbar {
      width: 0.25rem;
      height: 0.25rem;
      }
      
      .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
      --bg-opacity: 1;
      background-color: #f7fafc;
      background-color: rgba(247, 250, 252, var(--bg-opacity));
      }
      
      .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
      --bg-opacity: 1;
      background-color: #edf2f7;
      background-color: rgba(237, 242, 247, var(--bg-opacity));
      }
      
      .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
      border-radius: 0.25rem;
      }
   </style>
   
   <script>
      const el = document.getElementById('messages')
      el.scrollTop = el.scrollHeight
   </script>

   <div class="max-w-4xl mx-auto px-2 sm:px-6 mt-2 lg:px-8">
      <div class="mt-2 sm:mt-4 mb-4 w-full grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 gap-x-2 gap-y-2 items-center content-center">
   

            <a href="{{route('admin.disenos.index')}}">
               <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1">
                  <div class="flex items-center">
                     <div class="flex-shrink-0">
                        <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($diseños->count())}}</span>
                        <h3 class="sm:hidden text-base font-normal text-gray-500">Diseños Pend.</h3>
                        <h3 class="hidden sm:block text-base font-normal text-gray-500">Diseños Pendiente</h3>
                     </div>
                     <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                        
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                  </div>
               </div>
            </a>

            <a href="{{route('admin.disenos.produccion')}}">
               <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1">
                  <div class="flex items-center">
                     <div class="flex-shrink-0">
                        <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($produccion->count())}}</span>
                        <h3 class="sm:hidden text-base font-normal text-gray-500">Producción Pend.</h3>
                        <h3 class="hidden sm:block text-base font-normal text-gray-500">Producción Pendiente</h3>
                     </div>
                     <div class="hidden sm:flex ml-5 w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                        
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                  </div>
               </div>
            </a>

            <a href="{{route('admin.disenos.produccion')}}">
               <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1">
                  <div class="flex items-center">
                     <div class="flex-shrink-0">
                        <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($despacho->count())}}</span>
                        <h3 class="sm:hidden text-base font-normal text-gray-500">Despacho Pend.</h3>
                        <h3 class="hidden sm:block text-base font-normal text-gray-500">Despacho Pendiente</h3>
                     </div>
                     <div class="hidden sm:flex ml-5 w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                        
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                  </div>
               </div>
            </a>

      </div>
   </div>
</div>
