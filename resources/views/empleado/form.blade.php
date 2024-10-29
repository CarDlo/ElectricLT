<div class="grid grid-cols-1 gap-4 p-4 md:p-5 space-y-4 md:space-y-0">

    <div class="relative">
        <input type="text" id="cedula" name="cedula" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="cedula" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Cédula</label>
    </div>
    @error('cedula')
    <small>{{ $message }}</small>
    @enderror

    <div class="relative">
        <input type="text" id="nombre" name="nombre" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="nombre" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nombres</label>
    </div>
    @error('nombre')
    <small>{{ $message }}</small>
    @enderror

    <div class="relative">
        <input type="text" id="apellidos" name="apellidos" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="apellidos" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Apellidos</label>
    </div>
    @error('apellidos')
    <small>{{ $message }}</small>
    @enderror

    <div class="relative">
        <input type="text" id="cargo" name="cargo" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="cargo" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Cargo</label>
    </div>
    @error('cargo')
    <small>{{ $message }}</small>
    @enderror

    <div class="relative">
    <label for="empresa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Empresa</label>
    <select id="empresa_id" name="empresa_id" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($empresas as $empresa)
            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
        @endforeach
    </select>
    </div>
    @error('empresa_id')
    <small>{{ $message }}</small>
    @enderror

    <div class="relative">
    <label for="subcontratista_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subcontratista</label>
    <select id="subcontratista_id" name="subcontratista_id" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($subcontratistas as $subcontratista)
            <option value="{{ $subcontratista->id }}">{{ $subcontratista->nombre }}</option>
        @endforeach
    </select>
    </div>
    @error('subcontratista_id')
    <small>{{ $message }}</small>
    @enderror
{{-- 
    <!-- Campo oculto para 'estado' -->
<input type="hidden" name="estado" value="Pendiente">

<!-- Campo oculto para 'condicion' -->
<input type="hidden" name="condicion" value="Activo">

<!-- Campo oculto para 'user_id' -->
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

<!-- Campo oculto para 'fechaRetiro' (opcional, puede ser null) -->
<input type="hidden" name="fechaRetiro" value="">

<!-- Campo oculto para 'fechaAprobacion' (opcional, puede ser null) -->
<input type="hidden" name="fechaAprobacion" value="">
</div> --}}


<!-- Modal footer -->
<div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
    <button data-modal-hide="crear-modal" type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Crear</button>
    <button data-modal-hide="crear-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cerrar</button>
</div>
