<x-app-layout>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        <div x-data="setup()">
            <ul class="flex justify-center items-center my-4">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="cursor-pointer py-3 px-4 rounded transition"
                        :class="activeTab===index ? 'bg-red-500 text-white' : ' text-gray-500'" @click="activeTab = index"
                        x-text="tab"></li>
                </template>
            </ul>
            <div x-show="activeTab===0">
                
                @livewire('vendedor.public-show')
        
       
            </div>
            <div x-show="activeTab===1">
                @livewire('vendedor.pedidos-index')
            </div>
            
        </div>
            <script>
                    function setup() {
                    return {
                    activeTab: 0,
                    tabs: [
                        "Público",
                        "Vendedor"
                        
                    ]
                    };
                };
            </script>
        
    </x-fast-view>
</x-app-layout>