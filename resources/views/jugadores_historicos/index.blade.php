<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Administrar jugadores históricos') }}
        </h2>
    </x-slot>
    <body>
        @role('admin_Liga')
            <div id="divBotonCrear" class="m-5">
                <button type="submit" class="btn btn-primary m-2"><a class="dropdown-item text-white"
                        href="{{route('historicos.create')}}">Crear Jugador Histórico</a></button>
            </div>

            <div class="m-5 text-center" style="overflow-x:auto;">
                <table id='historicoTable' width='98%' class="table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Fecha de Nacimiento</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                </table>
            </div>
        @endrole
        @if (session('success'))
            <!-- Modal -->
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ session('success') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script para mostrar automáticamente el modal -->
            <script>
                $(document).ready(function() {
                    $('#successModal').modal('show');
                });
            </script>
        @endif


        @if (session('error'))
            <!-- Modal -->
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="errorModalLabel">Error</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ session('error') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script para mostrar automáticamente el modal -->
            <script>
                $(document).ready(function() {
                    $('#errorModal').modal('show');
                });
            </script>
        @endif

        <!-- Script -->
        <script type="text/javascript">
            $(document).ready(function() {

                // DataTable
                $('#historicoTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('historicos.getHistoricos') }}",
                    columns: [{
                            data: 'nombre'
                        },
                        {
                            data: 'apellido'
                        },
                        {
                            data: 'fechaNacimiento',
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                var eliminarUrl = "{{ route('historicos.eliminar', ':id') }}";
                                eliminarUrl = eliminarUrl.replace(':id', row.id);
                                var editarUrl = "{{ route('historicos.edit', ':id') }}";
                                editarUrl = editarUrl.replace(':id', row.id);
                                return '<div id="divAcciones"><form id="formEditarHistorico_' + row.id +
                                    '" method="POST" action="' + editarUrl +
                                    '" onsubmit="return confirm(\'¿Estás seguro de que deseas editar este jugador?\')">' +
                                    '<input type="hidden" name="_method" value="GET">' +
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                    '<button class="btn btn-outline-secondary m-2">Editar</button>' +
                                    '</form>' +
                                    '<form id="formEliminarHistorico_' + row.id +
                                    '" method="POST" action="' + eliminarUrl +
                                    '" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este jugador?\')">' +
                                    '<input type="hidden" name="_method" value="DELETE">' +
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                    '<button type="submit" class="btn btn-danger m-2">Eliminar</button>' +
                                    '</form></div>';
                            }
                        }
                    ],
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });

            });
        </script>

    </body>
</x-app-layout>
