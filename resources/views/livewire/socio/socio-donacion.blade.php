<div>
    <div class="mt-2" x-data="{open: false}">
        <div class="font-semibold text-center text-sm mb-2">¡¡ AUSPICIA A {{Str::limit(strtoupper($socio->name),10)}} AHORA !!</div>
        <p x-on:click="open=!open" class="text-center text-xs mb-2">Al realizar tu colaboración monetaria, apareceras en el perfil del rider como un auspiciador, manteniendo la cantidad donada de forma anonima.</p>

        <div class="flex justify-between text-sm">
        <div x-on:click="open=!open" wire:click='updatevalor(1000)'class="mt-[14px] whitespace-nowrap cursor-pointer bg-white rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$1.000</div>
        <div x-on:click="open=!open" wire:click='updatevalor(5000)'class="mt-[14px] whitespace-nowrap cursor-pointer bg-white rounded-[4px] border border-green-700 p-3 text-[#191D23]">$5.000</div>
        <div x-on:click="open=!open" wire:click='updatevalor(10000)'class="mt-[14px] whitespace-nowrap cursor-pointer bg-white rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$10.000</div>
        <div x-on:click="open=!open" wire:click='updatevalor(20000)'class="mt-[14px] whitespace-nowrap cursor-pointer bg-white rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$20.000</div>
        
        </div>
        <div>
            <div x-show="open">
                <input class="mt-2 w-full rounded-lg border border-[#A0ABBB] p-2" type="text" placeholder="${{$valor}}" />
                <p class="text-xs text-center mt-1">fono</p>
                <input class="w-full rounded-lg border border-[#A0ABBB] p-2" type="text" placeholder="+569..." />
                <a href= "" class="mt-2 btn btn-success btn-block">
                    Ir a Pagar
                </a>
            </div>
        </div>

    </div>
</div>
