<table id="subcontratistas" class="display compact" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Tramo</th>
            <th>Tipo</th>
            <th>Nit</th>
            <th>Descripcion</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($subcontratistas as $subcontratista)
            <tr>
                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                <td>{{ $subcontratista->nombre }}</td>
                <td>{{ $subcontratista->tramo }}</td>
                <td>{{ $subcontratista->tipo }}</td>
                <td>{{ $subcontratista->nit }}</td>
                <td>{{ $subcontratista->descripcion }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                    <form class="inline-flex rounded-md shadow-sm" role="group" action="{{ route('empresas.destroy', $subcontratista->id) }}" method="POST" id="miFormulario{{ $subcontratista->id }}">
                        <a href="{{ route('subcontratistas.show', $subcontratista->id) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('subcontratistas.edit', $subcontratista->id) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"><i class="fa-solid fa-pen-to-square"></i></a>

                        <button type="submit" href="{{ route('subcontratistas.destroy', $subcontratista->id) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white" onclick="preguntar{{ $subcontratista->id }}(event)">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        @csrf
                        @method('DELETE')
                    </form>
                                    <script>
                                        function preguntar{{ $subcontratista->id }}(event) {
                                            event.preventDefault();
                                            Swal.fire({
                                                        title: "¿Desea eliminar el subcontratista?",
                                                        showDenyButton: false,
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonText: "Eliminar",
                                                        cancelButtonText: "Cancelar",
                                                        confirmButtonColor: "#dc3545",
                                                        
                                                        }).then((result) => {
                                                        /* Read more about isConfirmed, isDenied below */
                                                            if (result.isConfirmed) {
                                                                document.getElementById("miFormulario{{ $subcontratista->id }}").submit();
                                                                
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
                new DataTable('#subcontratistas', {

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

            table.on('click', 'tbody tr', (e) => {
    let classList = e.currentTarget.classList;
 
    if (classList.contains('selected')) {
        classList.remove('selected');
    }
    else {
        table.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
        classList.add('selected');
    }
});
 
document.querySelector('#button').addEventListener('click', function () {
    table.row('.selected').remove().draw(false);
});
</script>