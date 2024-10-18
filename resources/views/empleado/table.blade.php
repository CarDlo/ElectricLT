<table id="empleados" class="display" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Cargo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($empleados as $empleado)
            <tr>
                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                <td>{{ $empleado->cedula }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido }}</td>
                <td>{{ $empleado->cargo }}</td>
                @if($empleado->estado === 'Pendiente')
                    <td class="bg-yellow-400">{{ $empleado->estado }}</td>
                @elseif($empleado->estado === 'Aprobado')
                    <td class="bg-green-400">{{ $empleado->estado }}</td>
                @elseif($empleado->estado === 'Rechazado')
                    <td class="bg-red-400">{{ $empleado->estado }}</td>
                @endif
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                    <form class="inline-flex rounded-md shadow-sm" role="group" action="{{ route('empresas.destroy', $empleado->id) }}" method="POST" id="miFormulario{{ $empleado->id }}">
                        <a href="{{ route('empleados.show', $empleado->id) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('empleados.destroy', $empleado->id) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white" onclick="preguntar{{ $empleados->id }}(event)">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </form>
                                    <script>
                                        function preguntar{{ $empleados->id }}(event) {
                                            event.preventDefault();
                                            Swal.fire({
                                                        title: "¿Desea eliminar el empleado?",
                                                        showDenyButton: false,
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonText: "Eliminar",
                                                        cancelButtonText: "Cancelar",
                                                        confirmButtonColor: "#dc3545",
                                                        
                                                        }).then((result) => {
                                                        /* Read more about isConfirmed, isDenied below */
                                                            if (result.isConfirmed) {
                                                                document.getElementById("miFormulario{{ $empresa->id }}").submit();
                                                                
                                                            } 
                                                        });
                                        }
                                    </script>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
                new DataTable('#empleados', {
                    responsive: true,
                    colReorder: true,
                    keys: true,
                    lengthMenu: [10, 25, 50, 75, 100, 500, 1000],
                    layout: {
                        topStart: {
                            buttons: [
                                'colvis',
                                {
                                    extend: 'excel',
                                    title: 'Empleados para aprobación',
                                    filename: 'EmpleadosAprobacion',
                                },
                                'copy',
                                {
                                    extend: 'pdf',
                                    title: 'Empleados para aprobación',
                                    filename: 'EmpleadosAprobacion',
                                    orientation: 'portrait',
                                    pageSize: 'A4',
                                    exportOptions: {
                                        columns: ':visible'
                                    },
                                    customize: function (doc) {
                                        doc.styles.title = {
                                            fontSize: 18,
                                            bold: true,
                                            alignment: 'center'
                                        };
                                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                    }
                                },
                            ]
                        },
                        bottomStart: 'pageLength',
                        bottom2Start: 'info',
                        bottom2End: {
                            searchBuilder: {
                                // config options here
                            }
                        }
                    },
                    language: {
                        url: '../DataTables/es-MX.json',
                    }
                });
            });
</script>