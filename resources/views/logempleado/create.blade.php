
<x-admin-layout>


    <x-slot name="sidebar">
        @include('layouts.include.sidebar.aprobaciones') <!-- Incluye el sidebar de Main o cualquier otro -->
    </x-slot>


    <div class="flex justify-between p-2 mb-2 text-sm text-black-800 rounded-lg bg-white dark:bg-gray-800 dark:text-blue-400" role="alert">
        <h3 class="text-3xl font-bold dark:text-white">Crear nuevo registro para: {{ $empleado->nombre }}</h3>
        <a href="{{ route('empleados.index') }}" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
            Atras
        </a>
    </div>

    
                                <form method="POST" action="{{ route('logempleados.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    @include('logempleado.form')
                                </form>

                                <script>
                                    // Asegúrate de que Dropzone no descubra automáticamente
                                    Dropzone.autoDiscover = false;
                                
                                    document.addEventListener('DOMContentLoaded', () => {
                                        const cedula = @json($empleado->cedula); // Obtener el valor de cedula
                                        const id = @json($empleado->id);
                                        new Dropzone('#my-dropzone', {
                                            url: `/upload/${cedula}`, // URL de tu controlador
                                            paramName: 'file', // Define el nombre del parámetro de archivo
                                            maxFilesize: 10, // Tamaño máximo del archivo en MB
                                            acceptedFiles: 'image/jpeg,image/png,application/pdf', // Aceptar solo JPG, PNG y PDF
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Añade el token CSRF
                                            },
                                            // Manejo de respuestas de éxito
                                            success: function(file, response) {
                                                console.log(response.message); // Mostrar mensaje de éxito
                                            },
                                            // Manejo de errores
                                            error: function(file, response) {
                                                console.error('Error:', response); // Mostrar error
                                            }
                                        });
                                    });
                                </script>
                            
</x-admin-layout>
