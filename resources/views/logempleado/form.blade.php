

<div class="grid grid-cols-1 gap-4 p-4 md:p-5 space-y-4 md:space-y-0">

     <!-- Detalle -->
     <label for="detalle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detalle del registro</label>
     <textarea id="detalle" name="detalle" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe aqui..."></textarea>
     @error('detalle')
     <small>{{ $message }}</small>
     @enderror
    <div class="grid gap-6 mb-6 md:grid-cols-2">

       
        <!-- Estado -->
        <div>
            <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
            <input type="text" id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Estado" required />
        </div>
        @error('estado')
        <small>{{ $message }}</small>
        @enderror
        <!-- Condición -->
        <div>
            <label for="condicion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condición</label>
            <input type="text" id="condicion" name="condicion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Condición" required />
        </div>

        <!-- Fecha de Retiro -->
        <div>
            <label for="fechaRetiro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Retiro</label>
            <input type="datetime-local" id="fechaRetiro" name="fechaRetiro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fecha de Retiro" />
        </div>
        @error('fechaRetiro')
        <small>{{ $message }}</small>
        @enderror
        <!-- Fecha de Aprobación -->
        <div>
            <label for="fechaAprobacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Aprobación</label>
            <input type="datetime-local" id="fechaAprobacion" name="fechaAprobacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fecha de Aprobación" />
        </div>

    @error('fechaAprobacion')
    <small>{{ $message }}</small>
    @enderror
 


    </div>

        <!-- Área específica de Dropzone -->
        <div id="my-dropzone" class="dropzone">


        </div>
    
<!-- Modal footer -->
<div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
    <button data-modal-hide="crear-modal" type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Crear</button>
    <button data-modal-hide="crear-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cerrar</button>
</div>


<!-- Importa el JavaScript de FilePond -->
