<x-app-layout>
    <body>
        @role('admin_Liga')
            <div id="divBotonCrear" class="m-5 d-flex justify-content-between">
                <div id="nombreCampeonato" class="text-left flex-grow-1 mb-2 mb-md-0">
                    {{$campeonatoSeleccionado->nombre}}
                </div>
                <button type="submit" class="btn btn-primary m-2">
                    <a class="dropdown-item text-white" href="{{ route('ediciones.create', ['idCampeonato' => $campeonatoSeleccionado->id]) }}">Crear Edicion</a>
                </button>
            </div>
                @if ($edicionesDelCampeonato->isNotEmpty())

            <div class="m-5 text-center" style="overflow-x:auto;">
                <table id='edicionTable' width='98%' class="table-bordered table-hover" >
                    <thead class="thead-dark">
                        <tr>
                            <td>Nombre</td>
                            <td>Fecha de Inicio</td>
                            <td>Fecha de finalización</td>
                            <td>Liguilla</td>
                            <td>Campeón</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                </table>
            </div>
            @else
            <div class="position-relative">
            <div id="sinEdiciones" class="m-5 position-absolute top-50 start-50 translate-middle text-center">
                Campeonato sin ediciones
            </div>
            </div>
            @endif
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

        <!-- Script -->
        <script type="text/javascript">
            $(document).ready(function() {
                // DataTable
                $('#edicionTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('ediciones.getEdicionesConCampeon', $campeonatoSeleccionado->id) }}",
                    columns: [{
                            data: 'nombre'
                        },
                        {
                            data: 'fechaInicio'
                        },
                        {
                            data: 'fechaFinal'
                        },
                        {
                            data: 'liguilla',
                            "render": function(data, type, row) {
                                if (data == true) {
                                    return '<span class="badge bg-success">Si</span>';
                                } else {
                                    return '<span class="badge bg-danger">No</span>';
                                }
                            }
                        },
                        {
                            data: 'nombreCampeon',
                            "render": function(data, type, row) {
                                if (data != null) {
                                    return '<span class="badge bg-primary">' + data + '</span>';
                                } else {
                                    return '<span class="badge bg-secondary">Sin definir</span>';
                                }
                            }
                        }
                        /*,
                                                {
                                                     "data": null,
                                                     "render": function(data, type, row) {
                                                         var editarUrl = "{{ route('equipos.edit', ':id') }}";
                                                         editarUrl = editarUrl.replace(':id', row.id);
                                                         return '<div id="divAcciones"><form id="formEditarEquipo_' + row.id +
                                                             '" method="POST" action="' + editarUrl +
                                                             '" onsubmit="return confirm(\'¿Estás seguro de que deseas editar este equipo?\')">' +
                                                             '<input type="hidden" name="_method" value="GET">' +
                                                             '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                                             '<button class="btn btn-outline-secondary m-2">Editar</button>' +
                                                             '</form>'
                                                     }
                                                }*/
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
