<x-tienda-layout :tienda="$tienda">
         <main>
            <div class="pt-6 px-4">
               
                   @if ($tienda->productos)
                    <div class="flex justify-center items-center w-full" x-data="{open:false}">
                        <div class="relative flex flex-col items-center rounded-[20px] w-full mx-auto bg-gray-200 bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                            <div class="mt-2 mb-8 w-full bg-white rounded-lg shadow-md py-4 px-6 max-w-2xl" x-show="!open">
                                <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-white text-center">
                                    ¡Carga tu primer producto! 
                                </h4>
                                <p class="mt-2 px-2 text-base text-gray-600 text-justify">
                                Es un paso fácil, sencillo y emocionante hacia el crecimiento de tu negocio. 
                                <br>Verás lo fácil y gratificante que es comenzar a generar más visibilidad de tus productos.
                              </p>
                              <div class="py-12 flex items-center justify-center">
                              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            
                                <!-- Pricing Card 1 -->
                                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                                  <div class="p-1 bg-blue-200">
                                  </div>
                                  <div class="p-4">
                                    <h2 class="text-xl font-bold text-gray-800 mb-4">Carga manual</h2>
                                    <p class="text-gray-600 mb-6">Crea y carga tus productos uno a uno</p>
                                  
                                  
                                  </div>
                                  <div class="p-4">
                                    <a href="{{route('tiendas.productos.manual',$tienda,null)}}">
                                    <button
                                      class="w-full bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                      Seleccionar
                                    </button>
                                    </a>
                                  </div>
                                </div>
                            
                                <!-- Pricing Card 2 -->
                                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                                  <div class="p-1 bg-green-200">
                                  </div>
                                  <div class="p-4">
                                    <h2 class="text-xl font-bold text-gray-800 mb-4">Carga masiva</h2>
                                    <p class="text-gray-600 mb-6">Sube tus productos masivamente</p>
                                    
                                  
                                  </div>
                                  <div class="p-4">
                                    <button
                                      class="w-full bg-green-500 text-white rounded-full px-4 py-2 hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                                      Seleccionar
                                    </button>
                                  </div>
                                </div>
                            
                                <!-- Pricing Card 3 -->
                                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                                  <div class="p-1 bg-purple-200">
                                  </div>
                                  <div class="p-4">
                                    <h2 class="text-xl font-bold text-gray-800 mb-4 whitespace-nowrap">Carga inteligente</h2>
                                    <p class="text-gray-600 mb-6">Utiliza nuestro gestor de productos</p>
                                    
                                  
                                  </div>
                                  <div class="p-4">
                                    <a href="{{route('tiendas.productos.inteligente',$tienda)}}">
                                      <button
                                        class="w-full bg-purple-500 text-white rounded-full px-4 py-2 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple active:bg-purple-800">
                                        Seleccionar
                                      </button>
                                    </a>
                                  </div>
                                </div>
                            
                              </div>
                            </div>        
                            </div> 
                            <div class="grid grid-cols-3 w-full gap-x-2" x-show="open">
                            
                                <div class="mx-auto w-full bg-white col-span-2">
                                    <form class="py-6 px-9"
                                      action="https://formbold.com/s/FORM_ID"
                                      method="POST">
                                      <div class="mb-5">
                                        <label
                                          for="email"
                                          class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                          Nombre:
                                        </label>
                                        <input
                                          type="email"
                                          name="email"
                                          id="email"
                                          placeholder="example@domain.com"
                                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                                      </div>
                                
                                      <div class="mb-6 pt-4">
                                        <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                          Upload File
                                        </label>
                                
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
                                
                                        <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
                                          <div class="flex items-center justify-between">
                                            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                              banner-design.png
                                            </span>
                                            <button class="text-[#07074D]">
                                              <svg
                                                width="10"
                                                height="10"
                                                viewBox="0 0 10 10"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                              >
                                                <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                                                  fill="currentColor"
                                                />
                                                <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                                                  fill="currentColor"
                                                />
                                              </svg>
                                            </button>
                                          </div>
                                        </div>
                                
                                        <div class="rounded-md bg-[#F5F7FB] py-4 px-8">
                                          <div class="flex items-center justify-between">
                                            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                              banner-design.png
                                            </span>
                                            <button class="text-[#07074D]">
                                              <svg
                                                width="10"
                                                height="10"
                                                viewBox="0 0 10 10"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                              >
                                                <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                                                  fill="currentColor"
                                                />
                                                <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                                                  fill="currentColor"
                                                />
                                              </svg>
                                            </button>
                                          </div>
                                          <div class="relative mt-5 h-[6px] w-full rounded-lg bg-[#E2E5EF]">
                                            <div
                                              class="absolute left-0 right-0 h-full w-[75%] rounded-lg bg-[#6A64F1]"
                                            ></div>
                                          </div>
                                        </div>
                                      </div>
                                
                                      <div>
                                        <button
                                          class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                                        >
                                          Send File
                                        </button>
                                      </div>
                                    </form>
                                </div>
                                <div class="mx-auto w-full bg-white">
                                    <form class="py-6 px-9"
                                      action="https://formbold.com/s/FORM_ID"
                                      method="POST">
                                      <div class="mb-5">
                                        <label
                                          for="email"
                                          class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                          Send files to this email:
                                        </label>
                                        <input
                                          type="email"
                                          name="email"
                                          id="email"
                                          placeholder="example@domain.com"
                                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                                      </div>
                                
                                      <div class="mb-6 pt-4">
                                        <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                          Upload File
                                        </label>
                                
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
                                
                                        <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
                                          <div class="flex items-center justify-between">
                                            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                              banner-design.png
                                            </span>
                                            <button class="text-[#07074D]">
                                              <svg
                                                width="10"
                                                height="10"
                                                viewBox="0 0 10 10"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                              >
                                                <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                                                  fill="currentColor"
                                                />
                                                <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                                                  fill="currentColor"
                                                />
                                              </svg>
                                            </button>
                                          </div>
                                        </div>
                                
                                        <div class="rounded-md bg-[#F5F7FB] py-4 px-8">
                                          <div class="flex items-center justify-between">
                                            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                              banner-design.png
                                            </span>
                                            <button class="text-[#07074D]">
                                              <svg
                                                width="10"
                                                height="10"
                                                viewBox="0 0 10 10"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                              >
                                                <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                                                  fill="currentColor"
                                                />
                                                <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                                                  fill="currentColor"
                                                />
                                              </svg>
                                            </button>
                                          </div>
                                          <div class="relative mt-5 h-[6px] w-full rounded-lg bg-[#E2E5EF]">
                                            <div
                                              class="absolute left-0 right-0 h-full w-[75%] rounded-lg bg-[#6A64F1]"
                                            ></div>
                                          </div>
                                        </div>
                                      </div>
                                
                                      <div>
                                        <button
                                          class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                                        >
                                          Send File
                                        </button>
                                      </div>
                                    </form>
                                </div>

                            

                            </div>
                            
                            
                        </div>  
                    </div>
                   @else
                       <div class="flex justify-center items-center w-full" x-data="{open:false}">
                           <div class="relative flex flex-col items-center rounded-[20px] w-full mx-auto bg-gray-200 bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                               <div class="mt-2 mb-8 w-full bg-white rounded-lg shadow-md py-4 px-6 max-w-2xl" x-show="!open">
                                   <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-white text-center">
                                       ¡Carga tu primer producto! 
                                   </h4>
                                   <p class="mt-2 px-2 text-base text-gray-600 text-justify">
                                    Es un paso fácil, sencillo y emocionante hacia el crecimiento de tu negocio. 
                                    <br>Verás lo fácil y gratificante que es comenzar a generar más visibilidad de tus productos.
                                 </p>
                                 <div class="py-12 flex items-center justify-center">
                                  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                
                                    <!-- Pricing Card 1 -->
                                    <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                                      <div class="p-1 bg-blue-200">
                                      </div>
                                      <div class="p-4">
                                        <h2 class="text-xl font-bold text-gray-800 mb-4">Carga manual</h2>
                                        <p class="text-gray-600 mb-6">Crea y carga tus productos uno a uno</p>
                                      
                                     
                                      </div>
                                      <div class="p-4">
                                        <a href="{{route('tiendas.productos.manual',$tienda,null)}}">
                                        <button
                                          class="w-full bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                          Seleccionar
                                        </button>
                                        </a>
                                      </div>
                                    </div>
                                
                                    <!-- Pricing Card 2 -->
                                    <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                                      <div class="p-1 bg-green-200">
                                      </div>
                                      <div class="p-4">
                                        <h2 class="text-xl font-bold text-gray-800 mb-4">Carga masiva</h2>
                                        <p class="text-gray-600 mb-6">Sube tus productos masivamente</p>
                                       
                                      
                                      </div>
                                      <div class="p-4">
                                        <button
                                          class="w-full bg-green-500 text-white rounded-full px-4 py-2 hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                                          Seleccionar
                                        </button>
                                      </div>
                                    </div>
                                
                                    <!-- Pricing Card 3 -->
                                    <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                                      <div class="p-1 bg-purple-200">
                                      </div>
                                      <div class="p-4">
                                        <h2 class="text-xl font-bold text-gray-800 mb-4 whitespace-nowrap">Carga inteligente</h2>
                                        <p class="text-gray-600 mb-6">Utiliza nuestro gestor de productos</p>
                                        
                                      
                                      </div>
                                      <div class="p-4">
                                        <a href="{{route('tiendas.productos.inteligente',$tienda)}}">
                                          <button
                                            class="w-full bg-purple-500 text-white rounded-full px-4 py-2 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple active:bg-purple-800">
                                            Seleccionar
                                          </button>
                                        </a>
                                      </div>
                                    </div>
                                
                                  </div>
                                </div>        
                               </div> 
                               <div class="grid grid-cols-3 w-full gap-x-2" x-show="open">
                                
                                    <div class="mx-auto w-full bg-white col-span-2">
                                       <form class="py-6 px-9"
                                         action="https://formbold.com/s/FORM_ID"
                                         method="POST">
                                         <div class="mb-5">
                                           <label
                                             for="email"
                                             class="mb-3 block text-base font-medium text-[#07074D]"
                                           >
                                             Nombre:
                                           </label>
                                           <input
                                             type="email"
                                             name="email"
                                             id="email"
                                             placeholder="example@domain.com"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                           />
                                         </div>
                                   
                                         <div class="mb-6 pt-4">
                                           <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                             Upload File
                                           </label>
                                   
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
                                   
                                           <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
                                             <div class="flex items-center justify-between">
                                               <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                                 banner-design.png
                                               </span>
                                               <button class="text-[#07074D]">
                                                 <svg
                                                   width="10"
                                                   height="10"
                                                   viewBox="0 0 10 10"
                                                   fill="none"
                                                   xmlns="http://www.w3.org/2000/svg"
                                                 >
                                                   <path
                                                     fill-rule="evenodd"
                                                     clip-rule="evenodd"
                                                     d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                                                     fill="currentColor"
                                                   />
                                                   <path
                                                     fill-rule="evenodd"
                                                     clip-rule="evenodd"
                                                     d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                                                     fill="currentColor"
                                                   />
                                                 </svg>
                                               </button>
                                             </div>
                                           </div>
                                   
                                           <div class="rounded-md bg-[#F5F7FB] py-4 px-8">
                                             <div class="flex items-center justify-between">
                                               <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                                 banner-design.png
                                               </span>
                                               <button class="text-[#07074D]">
                                                 <svg
                                                   width="10"
                                                   height="10"
                                                   viewBox="0 0 10 10"
                                                   fill="none"
                                                   xmlns="http://www.w3.org/2000/svg"
                                                 >
                                                   <path
                                                     fill-rule="evenodd"
                                                     clip-rule="evenodd"
                                                     d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                                                     fill="currentColor"
                                                   />
                                                   <path
                                                     fill-rule="evenodd"
                                                     clip-rule="evenodd"
                                                     d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                                                     fill="currentColor"
                                                   />
                                                 </svg>
                                               </button>
                                             </div>
                                             <div class="relative mt-5 h-[6px] w-full rounded-lg bg-[#E2E5EF]">
                                               <div
                                                 class="absolute left-0 right-0 h-full w-[75%] rounded-lg bg-[#6A64F1]"
                                               ></div>
                                             </div>
                                           </div>
                                         </div>
                                   
                                         <div>
                                           <button
                                             class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                                           >
                                             Send File
                                           </button>
                                         </div>
                                       </form>
                                    </div>
                                    <div class="mx-auto w-full bg-white">
                                       <form class="py-6 px-9"
                                         action="https://formbold.com/s/FORM_ID"
                                         method="POST">
                                         <div class="mb-5">
                                           <label
                                             for="email"
                                             class="mb-3 block text-base font-medium text-[#07074D]"
                                           >
                                             Send files to this email:
                                           </label>
                                           <input
                                             type="email"
                                             name="email"
                                             id="email"
                                             placeholder="example@domain.com"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                           />
                                         </div>
                                   
                                         <div class="mb-6 pt-4">
                                           <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                             Upload File
                                           </label>
                                   
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
                                   
                                           <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
                                             <div class="flex items-center justify-between">
                                               <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                                 banner-design.png
                                               </span>
                                               <button class="text-[#07074D]">
                                                 <svg
                                                   width="10"
                                                   height="10"
                                                   viewBox="0 0 10 10"
                                                   fill="none"
                                                   xmlns="http://www.w3.org/2000/svg"
                                                 >
                                                   <path
                                                     fill-rule="evenodd"
                                                     clip-rule="evenodd"
                                                     d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                                                     fill="currentColor"
                                                   />
                                                   <path
                                                     fill-rule="evenodd"
                                                     clip-rule="evenodd"
                                                     d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                                                     fill="currentColor"
                                                   />
                                                 </svg>
                                               </button>
                                             </div>
                                           </div>
                                   
                                           <div class="rounded-md bg-[#F5F7FB] py-4 px-8">
                                             <div class="flex items-center justify-between">
                                               <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                                 banner-design.png
                                               </span>
                                               <button class="text-[#07074D]">
                                                 <svg
                                                   width="10"
                                                   height="10"
                                                   viewBox="0 0 10 10"
                                                   fill="none"
                                                   xmlns="http://www.w3.org/2000/svg"
                                                 >
                                                   <path
                                                     fill-rule="evenodd"
                                                     clip-rule="evenodd"
                                                     d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                                                     fill="currentColor"
                                                   />
                                                   <path
                                                     fill-rule="evenodd"
                                                     clip-rule="evenodd"
                                                     d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                                                     fill="currentColor"
                                                   />
                                                 </svg>
                                               </button>
                                             </div>
                                             <div class="relative mt-5 h-[6px] w-full rounded-lg bg-[#E2E5EF]">
                                               <div
                                                 class="absolute left-0 right-0 h-full w-[75%] rounded-lg bg-[#6A64F1]"
                                               ></div>
                                             </div>
                                           </div>
                                         </div>
                                   
                                         <div>
                                           <button
                                             class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                                           >
                                             Send File
                                           </button>
                                         </div>
                                       </form>
                                    </div>

                                

                               </div>
                               
                               
                           </div>  
                       </div>
                   @endif
                
          
            </div>
         </main>
</x-tienda-layout>