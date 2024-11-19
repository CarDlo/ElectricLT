
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

                                        const id = @json($empleado->id);
                                        new Dropzone('#my-dropzone', {
                                            url: `/upload/${id}`, // URL de tu controlador

                                            //elimar open


                                            addRemoveLinks: true,  // Habilita los enlaces de agregar y eliminar
                                            dictRemoveFile: 'Eliminar',  // Texto para el botón de eliminar
                                            success: function(file, response) {
                                                // Verificar que el servidor devuelve un ID válido en la respuesta
                                                if (response.id) {
                                                    // Asignar el ID del archivo guardado en el servidor al objeto 'file'
                                                    file.serverId = response.id;  // Suponiendo que 'response.id' es el ID devuelto por el servidor
                                                    console.log("Archivo subido con ID:", file.serverId);
                                                } else {
                                                    console.error("No se ha recibido un ID válido desde el servidor.");
                                                }
                                            },
                                            removedfile: function(file) {
                                                // Verificar que 'file.serverId' está presente antes de hacer la solicitud de eliminación
                                                if (file.serverId) {
                                                    var fileId = file.serverId;  // Obtener el ID del archivo

                                                    // Enviar solicitud AJAX para eliminar el archivo
                                                    $.ajax({
                                                        url: '/destroy/' + fileId,  // Ruta para eliminar el archivo
                                                        type: 'DELETE',  // Usamos el método DELETE para eliminar el archivo
                                                        data: {
                                                            _token: $('meta[name="csrf-token"]').attr('content'),  // Incluir el token CSRF
                                                        },
                                                        success: function(response) {
                                                            console.log('Archivo eliminado correctamente');
                                                        },
                                                        error: function(xhr, status, error) {
                                                            console.log('Error al eliminar archivo: ' + error);
                                                        }
                                                    });

                                                    // Eliminar el archivo de Dropzone (del UI)
                                                    var _ref;
                                                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                                                } else {
                                                    console.error("No se encontró un ID para el archivo, no se puede eliminar.");
                                                }
                                            },

                                            //elimar close

                                            
                                            paramName: 'file', // Define el nombre del parámetro de archivo
                                            maxFilesize: 2, // Tamaño máximo del archivo en MB
                                            dictFileTooBig: "El archivo es demasiado grande. El tamaño máximo permitido es 3 MB.",
                                            acceptedFiles: 'image/jpeg,image/png,application/pdf', // Aceptar solo JPG, PNG y PDF
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Añade el token CSRF
                                            },
                                            // Manejo de respuestas de éxito
                                            success: function(file, response) {
                                                if (response.id) {
                                                    file.serverId = response.id;
                                                    console.log("Archivo subido con ID:", file.serverId);
                                                } else {
                                                    console.error("No se ha recibido un ID válido desde el servidor.");
                                                }
                                            },
                                            // Manejo de errores
                                            error: function(file, response) {
                                                console.error('Error:', response); // Mostrar error
                                            }
                                        });
                                    });
                                </script>
                            
</x-admin-layout>
