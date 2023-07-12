<div>
    <div class="block bg-gray-800 p-3 mt-4 rounded-lg">
                                
        <div class="mb-4">
            
            <h1 class="text-center font-bold  mb-2 text-white">Nro de Whatsapp:</h1>
            <input wire:model="nro" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
        </div>
     

        <div class="grid grid-cols-3 gap-y-2 justify-center mb-4">                 
            <button class="btn btn-success mx-2" wire:click="invitacion">Invitación Registro</button>
            <button class="btn btn-success mx-2" wire:click="carcasas">Catálogo Carcasas</button>
            <button class="btn btn-success mx-2" wire:click="accesorios">Catálogo Accesorios</button>
            <button class="btn btn-success mx-2" wire:click="polerones">Catálogo Polerones</button>
        </div>

        
    </div> 
</div>
