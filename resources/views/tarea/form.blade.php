<div class="space-y-6">
    
    <div>
        <x-label for="titulo" :value="__('Titulo')"/>
        <x-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" :value="old('titulo', $tarea?->titulo)" autocomplete="titulo" placeholder="Titulo"/>
        
    </div>
    <div>
        <x-label for="estado" :value="__('Estado')"/>
        <x-input id="estado" name="estado" type="text" class="mt-1 block w-full" :value="old('estado', $tarea?->estado)" autocomplete="estado" placeholder="Estado"/>
        
    </div>
    <div>
        <x-label for="vencimiento" :value="__('Vencimiento')"/>
        <x-input id="vencimiento" name="vencimiento" type="text" class="mt-1 block w-full" :value="old('vencimiento', $tarea?->vencimiento)" autocomplete="vencimiento" placeholder="Vencimiento"/>
        
    </div>


    <div class="flex items-center gap-4">
        <x-button>Submit</x-primary-button>
    </div>
</div>