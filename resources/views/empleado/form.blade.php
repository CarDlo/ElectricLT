<div class="space-y-6">
    
    <div>
        <x-label for="cedula" :value="__('Cedula')"/>
        <x-input id="cedula" name="cedula" type="text" class="mt-1 block w-full" :value="old('cedula', $empleado?->cedula)" autocomplete="cedula" placeholder="Cedula"/>
        
    </div>
    <div>
        <x-label for="nombre" :value="__('Nombre')"/>
        <x-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $empleado?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        
    </div>
    <div>
        <x-label for="apellidos" :value="__('Apellidos')"/>
        <x-input id="apellidos" name="apellidos" type="text" class="mt-1 block w-full" :value="old('apellidos', $empleado?->apellidos)" autocomplete="apellidos" placeholder="Apellidos"/>
        
    </div>
    <div>
        <x-label for="cargo" :value="__('Cargo')"/>
        <x-input id="cargo" name="cargo" type="text" class="mt-1 block w-full" :value="old('cargo', $empleado?->cargo)" autocomplete="cargo" placeholder="Cargo"/>
        
    </div>
    <div>
        <x-label for="estado" :value="__('Estado')"/>
        <x-input id="estado" name="estado" type="text" class="mt-1 block w-full" :value="old('estado', $empleado?->estado)" autocomplete="estado" placeholder="Estado"/>
        
    </div>
    <div>
        <x-label for="condicion" :value="__('Condicion')"/>
        <x-input id="condicion" name="condicion" type="text" class="mt-1 block w-full" :value="old('condicion', $empleado?->condicion)" autocomplete="condicion" placeholder="Condicion"/>
        
    </div>
    <div>
        <x-label for="empresa_id" :value="__('Empresa Id')"/>
        <x-input id="empresa_id" name="empresa_id" type="text" class="mt-1 block w-full" :value="old('empresa_id', $empleado?->empresa_id)" autocomplete="empresa_id" placeholder="Empresa Id"/>
        
    </div>
    <div>
        <x-label for="subcontratista_id" :value="__('Subcontratista Id')"/>
        <x-input id="subcontratista_id" name="subcontratista_id" type="text" class="mt-1 block w-full" :value="old('subcontratista_id', $empleado?->subcontratista_id)" autocomplete="subcontratista_id" placeholder="Subcontratista Id"/>
        
    </div>
    <div>
        <x-label for="user_id" :value="__('User Id')"/>
        <x-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" :value="old('user_id', $empleado?->user_id)" autocomplete="user_id" placeholder="User Id"/>
       
    </div>
    <div>
        <x-label for="fecha_retiro" :value="__('Fecharetiro')"/>
        <x-input id="fecha_retiro" name="fechaRetiro" type="text" class="mt-1 block w-full" :value="old('fechaRetiro', $empleado?->fechaRetiro)" autocomplete="fechaRetiro" placeholder="Fecharetiro"/>
        
    </div>
    <div>
        <x-label for="fecha_aprobacion" :value="__('Fechaaprobacion')"/>
        <x-input id="fecha_aprobacion" name="fechaAprobacion" type="text" class="mt-1 block w-full" :value="old('fechaAprobacion', $empleado?->fechaAprobacion)" autocomplete="fechaAprobacion" placeholder="Fechaaprobacion"/>
        
    </div>

    <div class="flex items-center gap-4">
        <x-button>Submit</x-primary-button>
    </div>
</div>